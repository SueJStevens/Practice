<?php
ob_start();
session_start();
if(!isset($_SESSION['UserID'])){
 header('location:index.php?user=invalid');
}
require_once('\incl\header.php');
$userID = $_SESSION['UserID'];
$usemode = $_SESSION['UseMode'];
$confyr = $_SESSION['ConfYr'];

//Set Path Variable
 if (isset($_SESSION['Path'])) {
   $path = $_SESSION['Path'];
 }

//On Save Actions
if (isset($_POST['save'])) {
 if(isset($_REQUEST["researched"])){
  $researched = "1";
 } else {
  $researched = "0";
 }
 if(isset($_REQUEST["publicofficial"])){
  $publicofficial = "1";
 } else {
  $publicofficial = "0";
 }
 if(isset($_REQUEST["insufficientaddress"])){
  $insufficientaddress = "1";
 } else {
  $insufficientaddress = "0";
 }
 if(isset($_REQUEST["useconsolidatedtemplate"])){
   $useconsolidatedtemplate = "1";
 } else {
   $useconsolidatedtemplate = "0";
 }
 if(isset($_REQUEST["donotprintaddressln1"])){
   $donotprintaddressln1 = "1";
 } else {
   $donotprintaddressln1 = "0";
 }
 $consolidatedtemplatecontactid = mssql_escape_string($_POST['consolidatedtemplatecontactid']);  
 $orgtypeID = mssql_escape_string($_POST['orgtype']);  
 $prfx = mssql_escape_string($_POST['prefix']);
 $firstname = mssql_escape_string($_POST['firstname']);
 $middleint = mssql_escape_string($_POST['middleint']);
 $lastname = mssql_escape_string($_POST['lastname']);
 $suffix = mssql_escape_string($_POST['suffix']);
 $credentials = mssql_escape_string($_POST['credentials']);
 $organization = mssql_escape_string($_POST['organization']);
 $orgabbrev = mssql_escape_string($_POST['orgabbrev']);
 $title = mssql_escape_string($_POST['title']);
 $titleabbrev = mssql_escape_string($_POST['titleabbrev']);
 $address1 = mssql_escape_string($_POST['address1']);
 $address2 = mssql_escape_string($_POST['address2']);
 $city = mssql_escape_string($_POST['city']);
 $postalcode = mssql_escape_string($_POST['statename']);
 $zip = mssql_escape_string($_POST['zip']);
 $country = mssql_escape_string($_POST['country']);
 $phonenum = mssql_escape_string($_POST['phone']);
 $faxnum = mssql_escape_string($_POST['fax']);
 $otherphonenum = mssql_escape_string($_POST['otherphone']);
 $emailaddress1 = mssql_escape_string($_POST['email1']);
 $emailaddress2 = mssql_escape_string($_POST['email2']);
  $salutation = mssql_escape_string($_POST['salutation']);
  $addressblockln1 = mssql_escape_string($_POST['addressblockln1']);
 $contactnotes = mssql_escape_string($_POST['contactnotes']);
  $researchedurl = mssql_escape_string($_POST['researchedurl']);
 $partnerassoc = mssql_escape_string($_POST['partnerassoc']);
 $firmcontact = mssql_escape_string($_POST['firmcontact']);
 require_once('\incl\contentmanager\contacts\CM_contact_insert.php');
}
?>

<script>
$(document).ready(
 function feedback() {

  var text_max_firstname = 30;
  $('#feedback_firstname').html(text_max_firstname + ' characters remain');
  $('#firstname').bind('input change paste keyup mouseup', function () {
   var text_max_firstname = 30;
   var text_length_firstname = $('#firstname').val().length;
   var text_remaining_firstname = text_max_firstname - text_length_firstname;
   $('#feedback_firstname').html(text_remaining_firstname + ' characters remain');
   $(this).after($('#feedback_firstname').html(text_remaining_firstname + ' characters remain'));
  });
  $('#firstname').keyup();

  var text_max_middleint = 20;
  $('#feedback_middleint').html(text_max_middleint + ' characters remain');
  $('#middleint').bind('input change paste keyup mouseup', function () {
   var text_max_middleint = 20;
   var text_length_middleint = $('#middleint').val().length;
   var text_remaining_middleint = text_max_middleint - text_length_middleint;
   $('#feedback_middleint').html(text_remaining_middleint + ' characters remain');
   $(this).after($('#feedback_middleint').html(text_remaining_middleint + ' characters remain'));
  });
  $('#middleint').keyup();

  var text_max_lastname = 50;
  $('#feedback_lastname').html(text_max_lastname + ' characters remain');
  $('#lastname').bind('input change paste keyup mouseup', function () {
   var text_max_lastname = 50;
   var text_length_lastname = $('#lastname').val().length;
   var text_remaining_lastname = text_max_lastname - text_length_lastname;
   $('#feedback_lastname').html(text_remaining_lastname + ' characters remain');
   $(this).after($('#feedback_lastname').html(text_remaining_lastname + ' characters remain'));
  });
  $('#lastname').keyup();

  var text_max_organization = 210;
  $('#feedback_organization').html(text_max_organization + ' characters remain');
  $('#organization').bind('input change paste keyup mouseup', function () {
   var text_max_organization = 210;
   var text_length_organization = $('#organization').val().length;
   var text_remaining_organization = text_max_organization - text_length_organization;
   $('#feedback_organization').html(text_remaining_organization + ' characters remain');
   $(this).after($('#feedback_organization').html(text_remaining_organization + ' characters remain'));
  });
  $('#organization').keyup();

  var text_max_orgabbrev = 210;
  $('#feedback_orgabbrev').html('0 characters used');
  $('#orgabbrev').bind('input change paste keyup mouseup', function () {
   var text_max_orgabbrev = 210;
   var text_length_orgabbrev = $('#orgabbrev').val().length;
   var text_remaining_orgabbrev = text_max_orgabbrev - text_length_orgabbrev;
   $('#feedback_orgabbrev').html(text_length_orgabbrev + ' characters used');
   $(this).after($('#feedback_orgabbrev').html(text_length_orgabbrev + ' characters used'));
  });
  $('#orgabbrev').keyup();

  var text_max_title = 150;
  $('#feedback_title').html(text_max_title + ' characters remain');
  $('#title').bind('input change paste keyup mouseup', function () {
   var text_max_title = 150;
   var text_length_title = $('#title').val().length;
   var text_remaining_title = text_max_title - text_length_title;
   $('#feedback_title').html(text_remaining_title + ' characters remain');
   $(this).after($('#feedback_title').html(text_remaining_title + ' characters remain'));
  });
  $('#title').keyup();

  var text_max_titleabbrev = 150;
  $('#feedback_titleabbrev').html('0 characters used');
  $('#titleabbrev').bind('input change paste keyup mouseup', function () {
   var text_max_titleabbrev = 150;
   var text_length_titleabbrev = $('#titleabbrev').val().length;
   var text_remaining_titleabbrev = text_max_titleabbrev - text_length_titleabbrev;
   $('#feedback_titleabbrev').html(text_length_titleabbrev + ' characters used');
   $(this).after($('#feedback_titleabbrev').html(text_length_titleabbrev + ' characters used'));
  });
  $('#titleabbrev').keyup();

  var text_max_address1 = 100;
  $('#feedback_address1').html(text_max_address1 + ' characters remain');
  $('#address1').bind('input change paste keyup mouseup', function () {
   var text_max_address1 = 100;
   var text_length_address1 = $('#address1').val().length;
   var text_remaining_address1 = text_max_address1 - text_length_address1;
   $('#feedback_address1').html(text_remaining_address1 + ' characters remain');
   $(this).after($('#feedback_address1').html(text_remaining_address1 + ' characters remain'));
  });
  $('#address1').keyup();

  var text_max_address2 = 50;
  $('#feedback_address2').html(text_max_address2 + ' characters remain');
  $('#address2').bind('input change paste keyup mouseup', function () {
   var text_max_address2 = 50;
   var text_length_address2 = $('#address2').val().length;
   var text_remaining_address2 = text_max_address2 - text_length_address2;
   $('#feedback_address2').html(text_remaining_address2 + ' characters remain');
   $(this).after($('#feedback_address2').html(text_remaining_address2 + ' characters remain'));
  });
  $('#address2').keyup();

  var text_max_city = 100;
  $('#feedback_city').html(text_max_city + ' characters remain');
  $('#city').bind('input change paste keyup mouseup', function () {
   var text_max_city = 100;
   var text_length_city = $('#city').val().length;
   var text_remaining_city = text_max_city - text_length_city;
   $('#feedback_city').html(text_remaining_city + ' characters remain');
   $(this).after($('#feedback_city').html(text_remaining_city + ' characters remain'));
  });
  $('#city').keyup();

  var text_max_zip = 15;
  $('#feedback_zip').html(text_max_zip + ' characters remain');
  $('#zip').bind('input change paste keyup mouseup', function () {
   var text_max_zip = 15;
   var text_length_zip = $('#zip').val().length;
   var text_remaining_zip = text_max_zip - text_length_zip;
   $('#feedback_zip').html(text_remaining_zip + ' characters remain');
   $(this).after($('#feedback_zip').html(text_remaining_zip + ' characters remain'));
  });
  $('#zip').keyup();

  var text_max_phone = 100;
  $('#feedback_phone').html(text_max_phone + ' characters remain');
  $('#phone').bind('input change paste keyup mouseup', function () {
   var text_max_phone = 100;
   var text_length_phone = $('#phone').val().length;
   var text_remaining_phone = text_max_phone - text_length_phone;
   $('#feedback_phone').html(text_remaining_phone + ' characters remain');
   $(this).after($('#feedback_phone').html(text_remaining_phone + ' characters remain'));
  });
  $('#phone').keyup();

  var text_max_fax = 100;
  $('#feedback_fax').html(text_max_fax + ' characters remain');
  $('#fax').bind('input change paste keyup mouseup', function () {
   var text_max_fax = 100;
   var text_length_fax = $('#fax').val().length;
   var text_remaining_fax = text_max_fax - text_length_fax;
   $('#feedback_fax').html(text_remaining_fax + ' characters remain');
   $(this).after($('#feedback_fax').html(text_remaining_fax + ' characters remain'));
  });
  $('#fax').keyup();

  var text_max_otherphone = 100;
  $('#feedback_otherphone').html(text_max_otherphone + ' characters remain');
  $('#otherphone').bind('input change paste keyup mouseup', function () {
   var text_max_otherphone = 100;
   var text_length_otherphone = $('#otherphone').val().length;
   var text_remaining_otherphone = text_max_otherphone - text_length_otherphone;
   $('#feedback_otherphone').html(text_remaining_otherphone + ' characters remain');
   $(this).after($('#feedback_otherphone').html(text_remaining_otherphone + ' characters remain'));
  });
  $('#otherphone').keyup();

  var text_max_email1 = 100;
  $('#feedback_email1').html(text_max_email1 + ' characters remain');
  $('#email1').bind('input change paste keyup mouseup', function () {
   var text_max_email1 = 100;
   var text_length_email1 = $('#email1').val().length;
   var text_remaining_email1 = text_max_email1 - text_length_email1;
   $('#feedback_email1').html(text_remaining_email1 + ' characters remain');
   $(this).after($('#feedback_email1').html(text_remaining_email1 + ' characters remain'));
  });
  $('#email1').keyup();

  var text_max_email2 = 100;
  $('#feedback_email2').html(text_max_email2 + ' characters remain');
  $('#email2').bind('input change paste keyup mouseup', function () {
   var text_max_email2 = 100;
   var text_length_email2 = $('#email2').val().length;
   var text_remaining_email2 = text_max_email2 - text_length_email2;
   $('#feedback_email2').html(text_remaining_email2 + ' characters remain');
   $(this).after($('#feedback_email2').html(text_remaining_email2 + ' characters remain'));
  });
  $('#email2').keyup();

   var text_max_salutation = 200;
   $('#feedback_salutation').html(text_max_salutation + ' characters remain');
   $('#salutation').bind('input change paste keyup mouseup', function () {
    var text_max_salutation = 200;
    var text_length_salutation = $('#salutation').val().length;
    var text_remaining_salutation = text_max_salutation - text_length_salutation;
    $('#feedback_salutation').html(text_remaining_salutation + ' characters remain');
    $(this).after($('#feedback_salutation').html(text_remaining_salutation + ' characters remain'));
   });
   $('salutation').keyup();

   var text_max_addressblockln1 = 200;
   $('#feedback_addressblockln1').html(text_max_addressblockln1 + ' characters remain');
   $('#addressblockln1').bind('input change paste keyup mouseup', function () {
    var text_max_addressblockln1 = 200;
    var text_length_addressblockln1 = $('#addressblockln1').val().length;
    var text_remaining_addressblockln1 = text_max_addressblockln1 - text_length_addressblockln1;
    $('#feedback_addressblockln1').html(text_remaining_addressblockln1 + ' characters remain');
    $(this).after($('#feedback_addressblockln1').html(text_remaining_addressblockln1 + ' characters remain'));
   });
   $('addressblockln1').keyup();


  var text_max_contactnotes = 4000;
  $('#feedback_contactnotes').html(text_max_contactnotes + ' characters remain');
  $('#contactnotes').bind('input change paste keyup mouseup', function () {
   var text_max_contactnotes = 4000;
   var text_length_contactnotes = $('#contactnotes').val().length;
   var text_remaining_contactnotes = text_max_contactnotes - text_length_contactnotes;
   $('#feedback_contactnotes').html(text_remaining_contactnotes + ' characters remain');
   $(this).after($('#feedback_contactnotes').html(text_remaining_contactnotes + ' characters remain'));
  });
  $('#contactnotes').keyup();

   var text_max_researchedurl = 4000;
   $('#feedback_researchedurl').html(text_max_researchedurl + ' characters remain');
   $('#researchedurl').bind('input change paste keyup mouseup', function () {
    var text_max_researchedurl = 4000;
    var text_length_researchedurl = $('#researchedurl').val().length;
    var text_remaining_researchedurl = text_max_researchedurl - text_length_researchedurl;
    $('#feedback_researchedurl').html(text_remaining_researchedurl + ' characters remain');
    $(this).after($('#feedback_researchedurl').html(text_remaining_researchedurl + ' characters remain'));
   });
   $('#researchedurl').keyup();


 }
 );
</script>

<script type="text/javascript">
$(document).ready(function()

{
$('#country').change(createSelectstate);

  function createSelectstate(){
  var e = document.getElementById("firmcontact");
  var firmcontactid = e.options[e.selectedIndex].value;
      var option = $(this).find(':selected').val();
      var dataString = "country="+option;
      if(option != '')
      {
          $.ajax({
              type     : 'GET',
              url      : './incl/preliminvites/hold_get_state_contacts.php',
              data     : dataString,
              dataType : 'JSON',
              cache: false,
              success  : function(data) {          
                  var output = '<option value="">Select State / Provence</option>';            
                  $.each(data.data, function(i,s){
                      var newOption = s;
                  
                      output += '<option value="' + newOption + '">' + newOption + '</option>';
                  });            
                  $('#statename').empty().append(output);
              },
              error: function(){
                  console.log("Ajax failed!!!");
              }
          }); 
      }
  }

});
</script>



<body>
 <html>
 <div class="row">
  <hr>
  <div class="large-12 columns">
   <a name="cm_contacts_add"></a>
   <h3>Add New Contact</h3>
   <hr>
   <form action="" method="post" name="form_CM_contacts_add" onSubmit="javascript: return validate();" enctype="multipart/form-data">
    <div class="row">
     <div class="large-12 columns">
      <div class="row">
       <div class="large-2 columns">
        <label for="insufficientaddress">Insufficient Address</label>
        <input type="checkbox" id="insufficientaddress" name="insufficientaddress">
       </div>
        <div class="large-2 columns">
         <label for="researched">Researched</label>
         <input type="checkbox" id="resesarched" name="researched">
        </div>
       <div class="large-2 columns">
         <label for="useconsolidatedtemplate">Consolidated</label>
         <input type="checkbox" id="useconsolidatedtemplate" name="useconsolidatedtemplate">
       </div>
         <div class="large-2 columns">
          <label for="consolidatedtemplatecontactid">Consolidated ID:
           <input type="text" name="consolidatedtemplatecontactid" id="consolidatedtemplatecontactid" maxlength="30" placeholder="consolidatedtemplatecontactid">
          </label>
         </div>
         <div class="large-4 columns"></div>
     </div>
      </div>
      <fieldset>
       <legend>Outreach Attorneys:</legend>
       <div class="row">
        <div class="large-12 columns">
         <label for="firmcontact">
          <span data-tooltip aria-haspopup="true" class="has-tip" title="Required.  Choose TBD if Outreach Attorney is not known.">Assign Outreach Attorney To This Contact:
           <i class="fi-info"></i>
          </span>
          <select name='firmcontact' id='firmcontact' placeholder="Choose Outreach Attorney">
           <option value="">Select Outreach Attorney...</option>
<?php
 $firmcontact = "SELECT   
                 FirmContactID
                 ,Informal
                 ,Formal
                 FROM LUFirmContact
                 WHERE Deactivate = 0
                 ORDER BY  SortOrder";
 $firmcontactresult = odbc_prepare($connection,$firmcontact);
 $firmcontactexc = odbc_execute($firmcontactresult);
 while ($row2 = odbc_fetch_array($firmcontactresult)) {
 echo "<option value='" . $row2['FirmContactID'] . "'>" . $row2['Informal'] . ' | ' . $row2['Formal'] .  "</option>";
 }
?>
          </select>
         </label>
        </div>
       </div>
      </fieldset>
      <fieldset>
       <legend>Contact Name:</legend>
       <div class="row">
        <div class="large-1 columns">
         <label for="prefix">Prefix:</label>
         <select name='prefix' id='prefix' placeholder="Choose Prefix">
          <option value="">Select...</option>
<?php
 $prfx = " SELECT   Prfx FROM    LUPrfx WHERE Deactivate = 0 ORDER BY  SortOrder";
 $prfxresult = odbc_prepare($connection,$prfx);
 $prfxexc = odbc_execute($prfxresult);
 while ($row1 = odbc_fetch_array($prfxresult)) {
  echo "<option value='" . $row1['Prfx'] . "'>" . $row1['Prfx'] . "</option>";
 }
?>
         </select>
        </div>
        <div class="large-3 columns">
         <label for="firstname">
          <span data-tooltip aria-haspopup="true" class="has-tip" title="Required.">First Name:
           <i class="fi-info"></i>
          </span>
          <input type="text" name="firstname" id="firstname" maxlength="30" required placeholder="First Name"> 
         </label>
         <p style="text-align: right" id="feedback_firstname"></p>
        </div>
        <div class="large-2 columns">
         <label for="middleint">Middle:</label>
         <input type="text" name="middleint" id="middleint" maxlength="20" placeholder="Middle"> 
         <p style="text-align: right" id="feedback_middleint"></p>
        </div>
        <div class="large-4 columns">
         <label for="lastname">
          <span data-tooltip aria-haspopup="true" class="has-tip" title="Required.">Last Name:
           <i class="fi-info"></i>
          </span>
          <input type="text" name="lastname" id="lastname" maxlength="50" required placeholder="Last Name"> 
         </label>
         <p style="text-align: right" id="feedback_lastname"></p>
        </div>
        <div class="large-1 columns">
         <label for="suffix">Suffix:</label>
         <select name='suffix'id='suffix' placeholder="Choose Suffix">
          <option value="">Select...</option>
<?php 
 $suffix = "SELECT Suffix FROM LUSuffix WHERE Deactivate = 0 ORDER BY  SortOrder";
 $suffixresult = odbc_prepare($connection,$suffix);
 $suffixexc = odbc_execute($suffixresult);
 while ($row2 = odbc_fetch_array($suffixresult)) {
  echo "<option value='" . $row2['Suffix'] . "'>" . $row2['Suffix'] . "</option>";
 }
?>
         </select>
        </div>
        <div class="large-1 columns">
         <label for="credentials">Credentials:</label>
         <select name='credentials' id='credentials' placeholder="Choose Credentials">
          <option value="">Select...</option>
<?php
 $credentials = "SELECT Credentials FROM LUCredentials WHERE Deactivate = 0 ORDER BY  SortOrder";
 $credentialsresult = odbc_prepare($connection,$credentials);
 $credentialsexc = odbc_execute($credentialsresult);
 while ($row3 = odbc_fetch_array($credentialsresult)) {
  echo "<option value='" . $row3['Credentials'] . "'>" . $row3['Credentials'] . "</option>";
 }
?>
         </select>
        </div>
       </div>

         <div class="large-12 columns">
          <input type="checkbox" id="donotprintaddressln1" name="donotprintaddressln1">
          <label for="donotprintaddressln1">Do Not Print Default Address Line 1 (optional, overrides defaults)</label>
         </div>

         <div class="large-6 columns">
          <label for="salutation">Salutation (optional, use only if different from default):</label>
          <input type="text" name="salutation" id="salutation" maxlength="200" placeholder="Salutation">
          <p style="text-align: right" id="feedback_salutation"></p>
         </div>
         <div class="large-6 columns">
          <label for="addressblockln1">Address Block Line 1 (optional, use only if different from default):</label>
          <input type="text" name="addressblockln1" id="addressblockln1" maxlength="200" placeholder="Address Block Line 1">
          <p style="text-align: right" id="feedback_addressblockln1"></p>
         </div>


      </fieldset>
     </div>
    </div>
    <div class="row">
     <div class="large-12 columns">
      <fieldset>
       <legend>Organization Information:</legend>
       <div class="row">
        <div class="large-12 columns">
         <label for="organization">Organization:</label>
         <input type="text" name="organization" id="organization" maxlength="210" placeholder="Organization"> 
         <p style="text-align: right" id="feedback_organization"></p>
        </div>
       </div>
       <div class="row">
        <div class="large-6 columns">
         <label for="orgabbrev">Organization Abbreviation:</label>
         <input type="text" name="orgabbrev" id="orgabbrev" maxlength="210" placeholder="Abbreviated Name for Organization"> 
         <p style="text-align: right" id="feedback_orgabbrev"></p>
        </div>
        <div class="large-5 columns">
         <label for="orgtype">
          <span data-tooltip aria-haspopup="true" class="has-tip" title="Required.  If not known, select 'Unknown'.">Organization Type:
           <i class="fi-info"></i>
          </span>
          <select required name='orgtype' id='orgtype' placeholder="Choose Organization Type">
           <option value="">Select...</option>
<?php
 $orgtype = "SELECT OrgTypeID, OrgTypeDescr, FormalOrgTypeDescr FROM LUOrgType WHERE Deactivate = 0 ORDER BY  SortOrder";
 $orgtyperesult = odbc_prepare($connection,$orgtype);
 $orgtypeexc = odbc_execute($orgtyperesult);
 while ($row4 = odbc_fetch_array($orgtyperesult)) {
  echo "<option value='" . $row4['OrgTypeID'] . "'>" . $row4['OrgTypeDescr'] . ' | ' . $row4['FormalOrgTypeDescr'] .  "</option>";
 }
?>
          </select>
         </label>
        </div>
        <div class="large-1 columns">
         <label for="publicofficial">Public Official</label>
         <input type="checkbox" id="publicofficial" name="publicofficial">
        </div>
       </div>
       <div class="row">
        <div class="large-5 columns">
         <label for="partnerassoc">
          <span data-tooltip aria-haspopup="true" class="has-tip" title="Required.  Select 'N/A' if Organization is not RGRD.">RGRD Relationship:
           <i class="fi-info"></i>
          </span>
          <select required name='partnerassoc' id='partnerassoc' placeholder="Choose RGRD Relationship">
           <option value="">Select...</option>
<?php
 $partnerassocsql = "SELECT PartnerAssocID, PartnerAssoc FROM LUPartnerAssoc WHERE Deactivate = 0 ORDER BY  SortOrder";
 $partnerassocresult = odbc_prepare($connection,$partnerassocsql);
 $partnerassocexc = odbc_execute($partnerassocresult);
 while ($row7 = odbc_fetch_array($partnerassocresult)) {
  echo "<option selected='5' value='". $row7['PartnerAssocID'] ."'>". $row7['PartnerAssoc'] ."</option>";
//  echo "<option selected='selected value='" . $row7['PartnerAssocID'] . "'>" . $row7['PartnerAssoc'] .  "</option>";
 }
?>
          </select>
         </label>
        </div>
       </div>
      </fiedset>
     </div>
    </div>
    <div class="row">
     <div class="large-12 columns">
      <fieldset>
       <legend>Title Within Organization:</legend>
       <div class="row">
        <div class="large-8 columns">
         <label for="title">Title:</label>
         <input type="text" name="title" id="title" maxlength="150" placeholder="title"> 
         <p style="text-align: right" id="feedback_title"></p>
        </div>
        <div class="large-4 columns">
         <label for="titleabbrev">Title Abbreviation:</label>
         <input type="text" name="titleabbrev" id="titleabbrev" maxlength="150" placeholder="Abbreviation for Title"> 
         <p style="text-align: right" id="feedback_titleabbrev"></p>
        </div>
       </div>
      </fieldset>
     </div>
    </div>
    <div class="row">
     <div class="large-12 columns">
      <fieldset>
       <legend>Address:</legend>
       <div class="row">
        <div class="large-12 columns">
         <label for="country">Country:</label>
         <select name='country' id='country' placeholder="Country">
          <option value="">Select...</option>
<?php
 $country = "SELECT Country FROM LUCountry WHERE Deactivate = 0 ORDER BY SortOrder";
 $countryresult = odbc_prepare($connection,$country);
 $countryexc = odbc_execute($countryresult);
 while ($row5 = odbc_fetch_array($countryresult)) {
  echo "<option value='" . $row5['Country'] . "'>" . $row5['Country'] ."</option>";
 }
?>
         </select>
        </div>
       </div>
       <div class="row">
        <div class="large-8 columns">
         <label for="address1">Address 1:</label>
         <input type="text" name="address1" id="address1" maxlength="100" placeholder="address1"> 
         <p style="text-align: right" id="feedback_address1"></p>
        </div>
        <div class="large-4 columns">
         <label for="address2">Address 2:</label>
         <input type="text" name="address2" id="address2" maxlength="50" placeholder="address2"> 
         <p style="text-align: right" id="feedback_address2"></p>
        </div>
       </div>
       <div class="row">
        <div class="large-7 columns">
         <label for="city">City:</label>
         <input type="text" name="city" id="city" maxlength="100" placeholder="city"> 
         <p style="text-align: right" id="feedback_city"></p>
        </div>

        <div class="large-3 columns">
          <label for="statename">
            <span data-tooltip aria-haspopup="true" class="has-tip" title="Required.">State / Provence:
              <i class="fi-info"></i>
            </span>
            <select name='statename' id='statename' placeholder="Choose State / Provence">
              <option value="">Select Country First...</option>
         </select>
        </div>

        <div class="large-2 columns">
         <label for="zip">Postal Zip Code:</label>
         <input type="text" name="zip" id="zip" maxlength="15" placeholder="zip"> 
         <p style="text-align: right" id="feedback_zip"></p>
        </div>
       </div>
      </fieldset>
     </div>
    </div>
    <div class="row">
     <div class="large-12 columns">
      <fieldset>
       <legend>Telephone and Email Information:</legend>
       <div class="row">
        <div class="large-4 columns">
         <label for="phone">Telephone Number:</label>
         <input type="text" name="phone" id="phone" maxlength="100" placeholder="phone"> 
         <p style="text-align: right" id="feedback_phone"></p>
        </div>
        <div class="large-4 columns">
         <label for="fax">Fax Number:</label>
         <input type="text" name="fax" id="fax" maxlength="100" placeholder="fax"> 
         <p style="text-align: right" id="feedback_fax"></p>
        </div>
        <div class="large-4 columns">
         <label for="otherphone">Other Telephone Number:</label>
         <input type="text" name="otherphone" id="otherphone" maxlength="100" placeholder="otherphone"> 
         <p style="text-align: right" id="feedback_otherphone"></p>
        </div>
       </div>
       <div class="row">
        <div class="large-6 columns">
         <label for="email1">Email Address 1:</label>
         <input type="text" name="email1" id="email1" maxlength="100" placeholder="email1"> 
         <p style="text-align: right" id="feedback_email1"></p>
        </div>
        <div class="large-6 columns">
         <label for="email2">Email Address 2:</label>
         <input type="text" name="email2" id="email2" maxlength="100" placeholder="email2"> 
         <p style="text-align: right" id="feedback_email2"></p>
        </div>
       </div>
      </fieldset>
     </div>
    </div>
      <label for="researchedurl"><b>Research URL:</b></label>
      <textarea name="researchedurl" id="researchedurl" maxlength="4000" placeholder="researchedurl"></textarea>
     </p>
     <p style="text-align: right" id="feedback_researchedurl"></p>
    <p>
     <label for="contactnotes">Notes / Remarks:</label>
     <textarea name="contactnotes" id="contactnotes" maxlength="4000" placeholder="contactnotes"></textarea>
    </p>
    <p style="text-align: right" id="feedback_contactnotes"></p>
    <hr>
    <p>
     <input type="submit" class="button" value="Save" name="save">
      <a href="<?php echo $path; ?>" class="button">Cancel</a>
    </p>
   </form>
  </div>
 </div>
</body>
</html>