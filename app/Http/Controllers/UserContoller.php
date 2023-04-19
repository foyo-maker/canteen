<?php

namespace App\Http\Controllers;

use DOMXPath;
use DOMDocument;
use XSLTProcessor;
use App\Models\User;
use SimpleXMLElement;
use App\Events\UserDeleted;
use App\Events\UserUpdate;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    public function index()
    {


        $users = User::all();

        // Create a new SimpleXMLElement object
        $xmlData = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE users SYSTEM "users.dtd"><users></users>');

        // Add each user to the XML data
        foreach ($users as $user) {
            $xmlUser = $xmlData->addChild('user');
            $xmlUser->addAttribute('id', $user->id);
            $xmlUser->addChild('name', $user->name);
            $xmlUser->addChild('email', $user->email);
        }
        // Write the XML data to the file
        $xmlData->asXML('../user.xml');
        $xml = new DOMDocument();
        $xml->load(public_path('../user.xml'));
        $xsl = new DOMDocument();
        $xsl->load(public_path('../user.xsl'));
        $proc = new XSLTProcessor();
        $proc->importStylesheet($xsl);
        $html = $proc->transformToXML($xml);
        return response($html)->header('Content-Type', 'text/html');
    }

    public function update(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();


        // Dispatch an event to update the XML file
        event(new UserUpdate($user));

    

        // $xml = simplexml_load_file('../user.xml');

        // // Find the user element by ID
        // $user = $xml->xpath("//user[@id='$user->id']")[0];

        // $user->childNode->nodeValue = "New name";



        // // Update the name element
  

        // // Save the updated XML file
        // $xml->asXML('user.xml');


        return redirect()->back();
    }
    public function edit($id)
    {



        $user = User::find($id);

        return view('welcome', [
            'user' => $user,

        ]);
    }

    public function delete($id)
    {


        // Find the user data to delete from the database based on the user ID
        $user = User::findOrFail($id);



        // Fire the UserDeleted event with the deleted user object
        event(new UserDeleted($user));

        // Delete the user data from the database
        $user->delete();


        return redirect()->back();
    }
}
