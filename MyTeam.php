<?php			
?>
<!doctype html>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<link rel="stylesheet" type="Ttext/css"/>
<link rel="stylesheet" type = "text/css" href = "login.css">
<html>
<head>
    <title>National Gymnastic Meet My Team</title>

</head>
<body>
    <header><h1>My Team</h1></header>
			<ul id="menu">
			<li><a class="active" href="Homepage.html">Home</a></li>
			<li><a href="logIn.html">Login</a></li>
			<li><a href="Registration.html">Registration</a></li>
			<li><a href="Contact.html">Contact</a></li>
			<li><a href="myteam.html">MyTeam</a><li>
            <a href="Report.html">Report</a>
			</ul>
			<br><br>
			
			<h2>Team Name</h2>
            <table name="teamComposition" id="teamTable" style="width 100%"> 
                <tr>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Birthday</td>
                    <td>Height</td>
                    <td>Weight</td>
                </tr>
            </table>
			<h3>Register Team Members</h3>
<section class="loginform cf">
<table name="teamComposition" style="width 100%"> 
</table>
<form name="Register Team Members" action="submit.php" method="post" accept-charset="utf-8">
    <ul style = "list-style: none;">
		<li><label for="teammemberfirstname">First Name: </label>
        <input type="firstname" id="fname" name="teammemberfirstname" placeholder="FirstName" required></li><br>
		<li><label for="teammemberlastname">Last Name: </label>
        <input type="lastname" id="lname" name="teammemberlastname" placeholder="LastName" required></li><br>
	<li><label for="teammembersex">Sex: </label>
        <input type="sex" id="sex" name="teammembersex" placeholder="M, F, O" maxlength="1" required></li><br>
	<li><label for="teammemberemail">Email: </label>
        <input type="email" id="email" name="teammemberemail" placeholder="abc@xyz.com" required></li><br>
		
		<li><label for="teammemberdob">Date of Birth: </label>
		<input type ="date" name="teammemberdob" id="teammemberdob" required></li><br>    


		<li><label for="Height">Height: </label>
		<input type ="Height" name="Height" id="heightInput" placeholder ="100" required>cm</li><br>
		<li><label for="Weight">Weight: </label>
		<input type ="Weight"  name="Weight" id="weightInput" placeholder ="150" required>kg</li><br>
		<li><label for="teammembernationality">Nationality</label><select>
<option value="  " selected>(Please Select a Country)
<option value="--">none
<option value="AF">Afghanistan 
<option value="AL">Albania 
<option value="DZ">Algeria 
<option value="AS">American Samoa
<option value="AD">Andorra 
<option value="AO">Angola
<option value="AI">Anguilla
<option value="AQ">Antarctica
<option value="AG">Antigua and Barbuda 
<option value="AR">Argentina 
<option value="AM">Armenia 
<option value="AW">Aruba 
<option value="AU">Australia 
<option value="AT">Austria 
<option value="AZ">Azerbaijan
<option value="BS">Bahamas 
<option value="BH">Bahrain 
<option value="BD">Bangladesh
<option value="BB">Barbados
<option value="BY">Belarus 
<option value="BE">Belgium 
<option value="BZ">Belize
<option value="BJ">Benin 
<option value="BM">Bermuda 
<option value="BT">Bhutan
<option value="BO">Bolivia 
<option value="BA">Bosnia and Herzegowina
<option value="BW">Botswana
<option value="BV">Bouvet Island 
<option value="BR">Brazil
<option value="IO">British Indian Ocean Territory
<option value="BN">Brunei Darussalam 
<option value="BG">Bulgaria
<option value="BF">Burkina Faso
<option value="BI">Burundi 
<option value="KH">Cambodia
<option value="CM">Cameroon
<option value="CA">Canada
<option value="CV">Cape Verde
<option value="KY">Cayman Islands
<option value="CF">Central African Republic
<option value="TD">Chad
<option value="CL">Chile 
<option value="CN">China 
<option value="CX">Christmas Island
<option value="CC">Cocos (Keeling) Islands 
<option value="CO">Colombia
<option value="KM">Comoros 
<option value="CG">Congo 
<option value="CD">Congo, the Democratic Republic of the 
<option value="CK">Cook Islands
<option value="CR">Costa Rica
<option value="CI">Cote d'Ivoire 
<option value="HR">Croatia (Hrvatska)
<option value="CU">Cuba
<option value="CY">Cyprus
<option value="CZ">Czech Republic
<option value="DK">Denmark 
<option value="DJ">Djibouti
<option value="DM">Dominica
<option value="DO">Dominican Republic
<option value="TP">East Timor
<option value="EC">Ecuador 
<option value="EG">Egypt 
<option value="SV">El Salvador 
<option value="GQ">Equatorial Guinea 
<option value="ER">Eritrea 
<option value="EE">Estonia 
<option value="ET">Ethiopia
<option value="FK">Falkland Islands (Malvinas) 
<option value="FO">Faroe Islands 
<option value="FJ">Fiji
<option value="FI">Finland 
<option value="FR">France
<option value="FX">France, Metropolitan
<option value="GF">French Guiana 
<option value="PF">French Polynesia
<option value="TF">French Southern Territories 
<option value="GA">Gabon 
<option value="GM">Gambia
<option value="GE">Georgia 
<option value="DE">Germany 
<option value="GH">Ghana 
<option value="GI">Gibraltar 
<option value="GR">Greece
<option value="GL">Greenland 
<option value="GD">Grenada 
<option value="GP">Guadeloupe
<option value="GU">Guam
<option value="GT">Guatemala 
<option value="GN">Guinea
<option value="GW">Guinea-Bissau 
<option value="GY">Guyana
<option value="HT">Haiti 
<option value="HM">Heard and Mc Donald Islands 
<option value="VA">Holy See (Vatican City State) 
<option value="HN">Honduras
<option value="HK">Hong Kong 
<option value="HU">Hungary 
<option value="IS">Iceland 
<option value="IN">India 
<option value="ID">Indonesia 
<option value="IR">Iran (Islamic Republic of)
<option value="IQ">Iraq
<option value="IE">Ireland 
<option value="IL">Israel
<option value="IT">Italy 
<option value="JM">Jamaica 
<option value="JP">Japan 
<option value="JO">Jordan
<option value="KZ">Kazakhstan
<option value="KE">Kenya 
<option value="KI">Kiribati
<option value="KP">Korea, Democratic People's Republic of
<option value="KR">Korea, Republic of
<option value="KW">Kuwait
<option value="KG">Kyrgyzstan
<option value="LA">Lao People's Democratic Republic
<option value="LV">Latvia
<option value="LB">Lebanon 
<option value="LS">Lesotho 
<option value="LR">Liberia 
<option value="LY">Libyan Arab Jamahiriya
<option value="LI">Liechtenstein 
<option value="LT">Lithuania 
<option value="LU">Luxembourg
<option value="MO">Macau 
<option value="MK">Macedonia, The Former Yugoslav Republic of
<option value="MG">Madagascar
<option value="MW">Malawi
<option value="MY">Malaysia
<option value="MV">Maldives
<option value="ML">Mali
<option value="MT">Malta 
<option value="MH">Marshall Islands
<option value="MQ">Martinique
<option value="MR">Mauritania
<option value="MU">Mauritius 
<option value="YT">Mayotte 
<option value="MX">Mexico
<option value="FM">Micronesia, Federated States of 
<option value="MD">Moldova, Republic of
<option value="MC">Monaco
<option value="MN">Mongolia
<option value="MS">Montserrat
<option value="MA">Morocco 
<option value="MZ">Mozambique
<option value="MM">Myanmar 
<option value="NA">Namibia 
<option value="NR">Nauru 
<option value="NP">Nepal 
<option value="NL">Netherlands 
<option value="AN">Netherlands Antilles
<option value="NC">New Caledonia 
<option value="NZ">New Zealand 
<option value="NI">Nicaragua 
<option value="NE">Niger 
<option value="NG">Nigeria 
<option value="NU">Niue
<option value="NF">Norfolk Island
<option value="MP">Northern Mariana Islands
<option value="NO">Norway
<option value="OM">Oman
<option value="PK">Pakistan
<option value="PW">Palau 
<option value="PA">Panama
<option value="PG">Papua New Guinea
<option value="PY">Paraguay
<option value="PE">Peru
<option value="PH">Philippines 
<option value="PN">Pitcairn
<option value="PL">Poland
<option value="PT">Portugal
<option value="PR">Puerto Rico 
<option value="QA">Qatar 
<option value="RE">Reunion 
<option value="RO">Romania 
<option value="RU">Russian Federation
<option value="RW">Rwanda
<option value="KN">Saint Kitts and Nevis 
<option value="LC">Saint LUCIA 
<option value="VC">Saint Vincent and the Grenadines
<option value="WS">Samoa 
<option value="SM">San Marino
<option value="ST">Sao Tome and Principe 
<option value="SA">Saudi Arabia
<option value="SN">Senegal 
<option value="SC">Seychelles
<option value="SL">Sierra Leone
<option value="SG">Singapore 
<option value="SK">Slovakia (Slovak Republic)
<option value="SI">Slovenia
<option value="SB">Solomon Islands 
<option value="SO">Somalia 
<option value="ZA">South Africa
<option value="GS">South Georgia and the South Sandwich Islands
<option value="ES">Spain 
<option value="LK">Sri Lanka 
<option value="SH">St. Helena
<option value="PM">St. Pierre and Miquelon 
<option value="SD">Sudan 
<option value="SR">Suriname
<option value="SJ">Svalbard and Jan Mayen Islands
<option value="SZ">Swaziland 
<option value="SE">Sweden
<option value="CH">Switzerland 
<option value="SY">Syrian Arab Republic
<option value="TW">Taiwan, Province of China 
<option value="TJ">Tajikistan
<option value="TZ">Tanzania, United Republic of
<option value="TH">Thailand
<option value="TG">Togo
<option value="TK">Tokelau 
<option value="TO">Tonga 
<option value="TT">Trinidad and Tobago 
<option value="TN">Tunisia 
<option value="TR">Turkey
<option value="TM">Turkmenistan
<option value="TC">Turks and Caicos Islands
<option value="TV">Tuvalu
<option value="UG">Uganda
<option value="UA">Ukraine 
<option value="AE">United Arab Emirates
<option value="GB">United Kingdom
<option value="US">United States 
<option value="UM">United States Minor Outlying Islands
<option value="UY">Uruguay 
<option value="UZ">Uzbekistan
<option value="VU">Vanuatu 
<option value="VE">Venezuela 
<option value="VN">Viet Nam
<option value="VG">Virgin Islands (British)
<option value="VI">Virgin Islands (U.S.) 
<option value="WF">Wallis and Futuna Islands 
<option value="EH">Western Sahara
<option value="YE">Yemen 
<option value="YU">Yugoslavia
<option value="ZM">Zambia
<option value="ZW">Zimbabwe</select></li><br>

        <input type="submit" onclick="createRow()" id="makeRow" value="Add Teammember"></button>

    </ul>
</form>	
<script src="../GymMeet/myteam.js">
    
</script>		
</body>
</html>
