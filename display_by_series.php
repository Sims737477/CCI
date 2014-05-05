
<?php
require("includes/NavBar.php");

//
// 1. Connect to local mySQL installation. User and password provided.
//
$db = mysql_connect("localhost","c1510a14","Outlawstar737477");
if (!$db)
   exit("Error - Could not connect to MySQL"); 
//
// 2. Select the database to use.
//
$er = mysql_select_db("c1510a14test");
if (!$er)
   exit("Error - Could not select the database!");
//
// 3. Issue SQL request.
//
$query = "select comics.comicName, series.seriesName, comics.issueNumber, author.authorFName,author.authorLName, artist.artistFName, artist.artistLName from comics
 inner join author on author.authorID = comics.authorID
 inner join artist on artist.artistID = comics.artistID
 inner join series on series.seriesID = comics.seriesID
  order by series.seriesName;";
$result = mysql_query($query);
if (!$result) {
   print "Error - query cannot be processed: ";
   $error = mysql_error();
   print "$error";
   exit;
}
//
// 4. Process the result.
//
$num_rows = mysql_num_rows($result);
print "<TABLE BORDER=1><TR><TH>Name</TH><TH>Series</TH><TH>Issue #</TH><TH>Author</TH><TH>Artist</TH></TR>";
for ($i = 0; $i < $num_rows; $i++) {
   $row = mysql_fetch_row($result);
   print "<TR><TD>$row[0]</TD><TD>$row[1]</TD><TD>$row[2]</TD><TD>$row[3]</TD<TD>$row[4]' '$row[5]</TD>><TD>$row[6]' '$row[7]</TD>></TR>";
}
print "</TABLE>";
?>

</body>
</html>