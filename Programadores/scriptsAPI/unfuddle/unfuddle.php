
// Edit your values here to match your account settings.

<?php
$config_method = 'GET';
$config_userpass = 'username:password';
$config_headers[] = 'Accept: application/xml';
$config_address = 'http://subdomain.unfuddle.com/api/v1/';
$config_datasource = 'projects.xml';

curl -i -u username:password -X GET \
  -H 'Accept: application/xml' \
  'http://mysubdomain.unfuddle.com/api/v1/projects/ZZZZ.xml'
http://mysubdomain.unfuddle.com/api/v1/projects


  
// Here we set up CURL to grab the data from Unfuddle
$chandle = curl_init();
curl_setopt($chandle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chandle, CURLOPT_URL, $config_address . $config_datasource);
curl_setopt($chandle, CURLOPT_HTTPHEADER, $config_headers);
curl_setopt($chandle, CURLOPT_USERPWD, $config_userpass);
curl_setopt($chandle, CURLOPT_CUSTOMREQUEST, $config_method);
$output = curl_exec($chandle);
curl_close($chandle);

// XML in PHP is simple to use with SimpleXML, go figure!
$xml = new SimpleXMLElement($output);

foreach ($xml->project as $project) {
  echo '(ID: ' . $project->{'id'} . ') - ' . $project->{'title'};
  echo '-------------------------------------------------------';
  echo $project->{'description'};
  echo '-------------------------------------------------------';
  echo 'Repos: ' . $project->{'repo-name'};
  echo 'Created: ' . $project->{'created-at'};
  echo 'Last mod: ' . $project->{'updated-at'};
  echo '-------------------------------------------------------';
}
?>



//curl -i -u username:password -X POST \
//  -H 'Accept: application/xml' \
// -H 'Content-Type: application/xml' \
// -d '<request-body-formatted-as-xml/>' \
// http://mysubdomain.unfuddle.com/api/v1/...

// link para API http://unfuddle.com/docs/api/code_examples#php