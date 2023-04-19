
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:include href="header.xsl" />
  <xsl:include href="footer.xsl" />
  <xsl:template match="/">
  <html>
    <head>
      <link rel="stylesheet" type="text/css" href="../css/users.css"/>
    </head>
      <xsl:call-template name="header" />
    <body>
      <h1>User List</h1>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        <xsl:for-each select="users/user">
          <tr>
            <td><xsl:value-of select="id"/></td>
            <td><xsl:value-of select="name"/></td>
            <td><xsl:value-of select="email"/></td>
            <td>
              <a href="/update/{@id}">Update</a>
              <a href="/delete/{@id}">Delete</a>
            </td>
          </tr>
        </xsl:for-each>
      </table>
    </body>
  </html>
  <xsl:call-template name="footer" />
</xsl:template>
</xsl:stylesheet>


