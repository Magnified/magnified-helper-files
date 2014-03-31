<?php
#### UTLILITY CLASS ##########

// Class declaration
class Utility  {
	
	// Constructor
	function Utility(){
		
	}
	
	// FORM STUFF
	
	// State selecter
	function stateSelecter($fieldName,$fieldValue='',$class='',$tabindex=''){
		$classHTML = '';
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		$states = array(
						''=>'- Select State -',
						'AK'=>'Alabama',
						'AK'=>'Alaska',
						'AZ'=>'Arizona',
						'AR'=>'Arkansas',
						'CA'=>'California',
						'CO'=>'Colorado',
						'CT'=>'Connecticut',
						'DE'=>'Deleware',
						'DC'=>'District of Columbia',
						'FL'=>'Florida',
						'GA'=>'Georgia',
						'HI'=>'Hawaii',
						'ID'=>'Idaho',
						'IL'=>'Illinois',
						'IN'=>'Indiana',
						'IA'=>'Iowa',
						'KS'=>'Kansas',
						'KY'=>'Kentucky',
						'LA'=>'Louisiana',
						'ME'=>'Maine',
						'MD'=>'Maryland',
						'MA'=>'Massachussetts',
						'MI'=>'Michigan',
						'MN'=>'Minnesota',
						'MS'=>'Mississippi',
						'MO'=>'Missouri',
						'MT'=>'Montana',
						'NE'=>'Nebraska',
						'NV'=>'Nevada',
						'NH'=>'New Hampshire',
						'NJ'=>'New Jersey',
						'NM'=>'New Mexico',
						'NY'=>'New York',
					   	'NC'=>'North Carolina',
						'ND'=>'North Dakota',
						'OH'=>'Ohio',
						'OK'=>'Oklahona',
						'OR'=>'Oregonb',
						'PA'=>'Pennsylvania',
						'RI'=>'Rhode Island',
						'SC'=>'South Carolina',
						'SD'=>'South Dakota',
						'TN'=>'Tennessee',
						'TX'=>'Texas',
						'UT'=>'Utah',
						'VT'=>'Vermont',
						'VA'=>'Virginia',
						'WA'=>'Washington',
						'WV'=>'West Virginia',
						'WI'=>'Wisconsin',
						'WY'=>'Wyoming',
					   );
		echo '<select name="'.$fieldName.'" id="'.$fieldName.'" '.$classHTML.' required tabindex="' . $tabindex . '">'."\n";					
			
		foreach($states as $value=>$name){
			if($fieldValue==$value){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>'."\n";	
		}
			
        echo '</select>'."\n";
	}
	
	// Category
	function categorySelecter($fieldName,$required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="'.$fieldName.'" '.$classHTML.' title="Please select a category" '.$requiredText.'>'."\n";
		
		$q = "select id,name from ".CATEGORIES_TABLE." where id>2 order by name asc";
		$r = mysql_query($q);
		
		echo '<option value="">- Select Category -</option>';
		$cats[1] = '* News';
		$cats[2] = '* Breaking';
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}
	
	
	// Status
	function statusSelecter($required,$fieldValue='',$class='',$tabindex=''){
		$classHTML = '';
		$requiredText = '';
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="status" '.$classHTML.' title="Please select a story status" '.$requiredText.' tabindex="'.$tabindex.'">'."\n";
		
		$q = "select id,status_name from ".BOOKING_STATUS_TABLE." order by id asc";
		$r = mysql_query($q);
		
		echo '<option value="">- Select Status -</option>';
		
		while($row = mysql_fetch_assoc($r)){
			if($fieldValue==$row['id']){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$row['id'].'" ' . $selected . '>' . $row['staus_name'] . '</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}
	
	function statusSelectFilter($required,$fieldValue='',$class='',$type='',$tabindex=''){
		$classHTML='';
		$requiredText='';
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="status" '.$classHTML.' title="Please select a story status" '.$requiredText.' tabindex="' . $tabindex . '">'."\n";
		
		if($type=='b'){ $q = "select id,status_name from ".BOOKING_STATUS_TABLE." order by id asc"; }
		if($type=='f'){ $q = "select id,status_name from ".FUNDRAISER_STATUS_TABLE." order by id asc"; }
		if($type=='r'){ $q = "select id,status_name from ".REFERRER_STATUS_TABLE." order by id asc"; }
		$r = mysql_query($q);
		
		echo '<option value="">- Any -</option>';
		
		while($row = mysql_fetch_array($r)){
			if($fieldValue==$row['id']){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['status_name'].'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}

	function packageSelectFilter($required,$fieldValue='',$class='',$type='',$tabindex=''){
		$classHTML='';
		$requiredText='';
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="package_id" '.$classHTML.' title="Please select a package type" '.$requiredText.' tabindex="' . $tabindex . '">'."\n";
		
		if($type=='b'){ $q = "select id,package_name from package_levels order by id asc"; }
		
		$r = mysql_query($q);
		
		echo '<option value="">- Any -</option>';
		
		while($row = mysql_fetch_array($r)){
			if($fieldValue==$row['id']){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['package_name'].'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}
	
	
	function statusRadio($fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		$q = "select id,name from ".STATUS_TABLE." order by status_order asc";
		$r = mysql_query($q);
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'checked="checked"';} else { $selected=''; }
			echo '<input type="radio" name="status" value="'.$value.'" '.$selected.' '.$classHTML.' validate="required:true" /> - '.$name."\n";	
		}
		
	}
	
	function statusRadioFilter($fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		$q = "select id,name from ".STATUS_TABLE." order by id asc";
		$r = mysql_query($q);
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'checked="checked"';} else { $selected=''; }
			echo '<input type="radio" name="status" value="'.$value.'" '.$selected.' '.$classHTML.' /> - '.$name."\n";	
		}
		
		if($fieldValue==''){ $s = 'checked="checked"'; }
		echo '<input type="radio" name="status" value="" '.$s.' '.$classHTML.' /> - All'."\n";	
		
	}
	
	// Format
	function formatSelecter($required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="format" '.$classHTML.' title="Please select a format" '.$requiredText.'>'."\n";
		
		$q = "select id,name from ".FORMATS_TABLE." order by name asc";
		$r = mysql_query($q);
		
		echo '<option value="">- Select Format -</option>';
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}
	
	function formatSelectFilter($required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="format_id" '.$classHTML.' title="Please select a format" '.$requiredText.'>'."\n";
		
		$q = "select id,name from ".FORMATS_TABLE." order by name asc";
		$r = mysql_query($q);
		
		echo '<option value="">- Any -</option>';
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}
	
	function formatRadio($fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		$q = "select id,name from ".FORMATS_TABLE." order by name asc";
		$r = mysql_query($q);
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'checked="checked"';} else { $selected=''; }
			echo '<input type="radio" name="format_id" value="'.$value.'" '.$selected.' '.$classHTML.'validate="required:true"  /> - '.$name."\n";	
		}
		
	}
	
	function playerRadio($fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		if($fieldValue==''){ $fieldValue = 'n'; }
		
		$q = "select id,name from ".FORMATS_TABLE." order by name asc";
		$r = mysql_query($q);
		
		$vals = array(
					  'n' => 'No',
					  'y' => 'Yes'
					  );
		
		foreach($vals as $value=>$name){
			if($fieldValue==$value){ $selected = 'checked="checked"';} else { $selected=''; }
			echo '<input type="radio" name="player" value="'.$value.'" '.$selected.' '.$classHTML.'validate="required:true"  /> - '.$name."\n";	
		}
		
	}
	
	function formatRadioFilter($fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		$q = "select id,name from ".FORMATS_TABLE." order by name asc";
		$r = mysql_query($q);
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'checked="checked"';} else { $selected=''; }
			echo '<input type="radio" name="format_id" value="'.$value.'" '.$selected.' '.$classHTML.' /> - '.$name."\n";	
		}
		
		if($fieldValue==''){ $s = 'checked="checked"'; }
		echo '<input type="radio" name="format_id" value="" '.$s.' '.$classHTML.' /> - All'."\n";
		
	}
	
	// Job
	function jobSelecter($required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="job" '.$classHTML.' title="Please select a job" '.$requiredText.'>'."\n";
		
		$q = "select id,name from ".JOBS_TABLE." order by name asc";
		$r = mysql_query($q);
		
		echo '<option value="">- Select Job -</option>';
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}
	
	function jobSelectFilter($required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="job" '.$classHTML.' title="Please select a job" '.$requiredText.'>'."\n";
		
		$q = "select id,name from ".JOBS_TABLE." order by name asc";
		$r = mysql_query($q);
		
		echo '<option value="">- Any -</option>';
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}
	
	function jobRadio($fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		$q = "select id,name from ".JOBS_TABLE." order by name asc";
		$r = mysql_query($q);
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'checked="checked"';} else { $selected=''; }
			echo '<input type="radio" name="job" value="'.$value.'" '.$selected.' '.$classHTML.' validate="required:true" /> - '.$name."\n";	
		}
		
	}
	
	function jobRadioFilter($fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		$q = "select id,name from ".JOBS_TABLE." order by name asc";
		$r = mysql_query($q);
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'checked="checked"';} else { $selected=''; }
			echo '<input type="radio" name="job" value="'.$value.'" '.$selected.' '.$classHTML.' /> - '.$name."\n";	
		}
		
		if($fieldValue==''){ $s = 'checked="checked"'; }
		echo '<input type="radio" name="job" value="" '.$s.' '.$classHTML.' /> - All'."\n";
		
	}
	
	// Approved by
	function approvedBySelecter($required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="approved_by" '.$classHTML.' title="Please select a format" '.$requiredText.'>'."\n";
		
		$q = "select id,fname,lname from ".USERS_TABLE." order by fname asc";
		$r = mysql_query($q);
		
		echo '<option value="">- Any -</option>';
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['fname'].' '.substr($row['lname'],0,1).'.';
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}
	
	// Captured by
	function capturedBySelecter($required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="captured_by" '.$classHTML.' title="Please select a format" '.$requiredText.'>'."\n";
		
		$q = "select id,fname,lname from ".USERS_TABLE." order by fname asc";
		$r = mysql_query($q);
		
		echo '<option value="">- Any -</option>';
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['fname'].' '.substr($row['lname'],0,1).'.';
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}
	
	// Captured by
	function foundBySelecter($required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="found_by" '.$classHTML.' title="Please select a format" '.$requiredText.'>'."\n";
		
		$q = "select id,fname,lname from ".USERS_TABLE." order by fname asc";
		$r = mysql_query($q);
		
		echo '<option value="">- Any -</option>';
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['fname'].' '.substr($row['lname'],0,1).'.';
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}
	
	function foundBySelecterAddForm($required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="found_by" '.$classHTML.' title="Please select a format" '.$requiredText.'>'."\n";
		
		$q = "select id,fname,lname from ".USERS_TABLE." order by fname asc";
		$r = mysql_query($q);
		
		echo '<option value="">- Select User -</option>';
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['fname'].' '.substr($row['lname'],0,1).'.';
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}

	
	// Chat method
	function chatMethodSelecter($required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="chat-method" '.$classHTML.' title="Please select a web chat method" '.$requiredText.'>'."\n";
		
		$q = "select id,name from ".CHAT_METHODS_TABLE." order by name asc";
		$r = mysql_query($q);
		
		echo '<option value="">- Select Chat Method if Applicable -</option>';
		
		while($row = mysql_fetch_array($r)){
			$cats[$row['id']] = $row['name'];
		}
		
		foreach($cats as $value=>$name){
			if($fieldValue==$value){ $selected = 'selected="selected"';} else { $selected=''; }
			echo '<option value="'.$value.'" '.$selected.'>'.$name.'</option>'."\n";	
		}
			
        echo '</select>'."\n";
		
	}
	
	// Edited
	function yesNoRadio($fieldName,$required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		if($fieldValue=='y'){ $yselected = 'checked="checked"';}
		if($fieldValue=='n'){ $nselected='checked="checked"';}
		if($fieldValue==''){ $s='checked="checked"';}

		echo '<input type="radio" name="'.$fieldName.'" value="y" '.$yselected.' '.$classHTML.' '.$requiredText.' /> - Yes'."\n";
		echo '<input type="radio" name="'.$fieldName.'" value="n" '.$nselected.' '.$classHTML.' '.$requiredText.' /> - No'."\n";
	
	}
	
	function yesNoRadio2($fieldName,$required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		if($fieldValue=='y'){ $yselected = 'checked="checked"';}
		if($fieldValue=='n' || $fieldValue==''){ $nselected='checked="checked"';}

		echo '<input type="radio" name="'.$fieldName.'" value="y" '.$yselected.' '.$classHTML.' '.$requiredText.' /> - Yes'."\n";
		echo '<input type="radio" name="'.$fieldName.'" value="n" '.$nselected.' '.$classHTML.' '.$requiredText.' /> - No'."\n";
	
	}
	
	function yesNoRadioDatetime($fieldName,$required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		if($fieldValue!='0000-00-00 00:00:00'){ $y = 'checked="checked"';}
		if($fieldValue=='0000-00-00 00:00:00'){ $n='checked="checked"';}
		
		
		echo '<input type="radio" name="'.$fieldName.'" value="y" '.$y.' '.$classHTML.' '.$requiredText.' /> - Yes'."\n";
		echo '<input type="radio" name="'.$fieldName.'" value="n" '.$n.' '.$classHTML.' '.$requiredText.' /> - No'."\n";
	
	}
	
	function yesNoRadioFilter($fieldName,$required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		if($fieldValue=='y'){ $yselected = 'checked="checked"';}
		if($fieldValue=='n'){ $nselected='checked="checked"';}
		if($fieldValue==''){ $s='checked="checked"';}
			echo '<input type="radio" name="'.$fieldName.'" value="y" '.$yselected.' '.$classHTML.' '.$requiredText.' /> - Yes'."\n";
			echo '<input type="radio" name="'.$fieldName.'" value="n" '.$nselected.' '.$classHTML.' '.$requiredText.' /> - No'."\n";
			echo '<input type="radio" name="'.$fieldName.'" value="" '.$s.' '.$classHTML.' '.$requiredText.' /> - All'."\n";
		
	}


	function yesNoSelectFilter($fieldName,$required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="'.$fieldName.'" '.$classHTML.' title="" '.$requiredText.'>'."\n";
		
		if($fieldValue=='y'){ $y = 'selected="selected"';}
		if($fieldValue=='n'){ $n='selected="selected"';}
		if($fieldValue==''){ $s='selected="selected"';}
		
		echo '<option value="" '.$s.'>- Any -</option>';
		echo '<option value="y" '.$y.'>Yes</option>'."\n";
		echo '<option value="n" '.$n.'>No</option>'."\n";
		
        echo '</select>'."\n";
	}
	
	function yesNoSelectFilter2($fieldName,$required,$fieldValue='',$class=''){
		if($class!=''){ $classHTML = 'class="'.$class.'"'; }
		
		if($required=='y'){ $requiredText = 'validate="required:true"'; }
		
		echo '<select name="'.$fieldName.'" '.$classHTML.' title="" '.$requiredText.'>'."\n";
		
		if($fieldValue=='y'){ $y = 'selected="selected"';}
		if($fieldValue=='n'){ $n='selected="selected"';}
		
		echo '<option value="">- Select -</option>';
		echo '<option value="y" '.$y.'>Yes</option>'."\n";
		echo '<option value="n" '.$n.'>No</option>'."\n";
		
        echo '</select>'."\n";
	}

	
	// Create url code for product name
	function createURL($filename){
		$filename = strtolower($filename);
		$filename = str_replace("1/8","one-sixteenth",$filename);
		$filename = str_replace("1/8","one-eighth",$filename);
		$filename = str_replace("1/4","one-quarter",$filename);
		$filename = str_replace("1/2","one-half",$filename);
		$filename = str_replace('&','-and-',$filename);
		$replace="-";
		$filename = preg_replace("/[^a-zA-Z0-9\.]/",$replace,$filename);
		$filename = str_replace('--','-',$filename);
		$filename = str_replace('-','-',$filename);
		if(substr($filename,-1,1)=='-'){ $filename = substr($filename,0,-1); }
		if(substr($filename,0,1)=='-'){ $filename = substr($filename,1); }
		
		return $filename;
	}


	// Get user IP address
	function getUserIP(){
		$ip=false;
		if(!empty($_SERVER["HTTP_CLIENT_IP"])){
			$ip = $_SERVER["HTTP_CLIENT_IP"];
		}
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
			if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
			for ($i = 0; $i < count($ips); $i++) {
				if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
					$ip = $ips[$i];
				break;
				}
			}
		}
		return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
	}
	
	
	// Create unique filename width time stamp
	function cleanFilename($filename){
		$replace="-";
		$fname = date("mdyHis").'-'.preg_replace("/[^a-zA-Z0-9\.]/",$replace,strtolower($filename));
		return $fname;
	}
		
		
	// Valid image size/dimension
	function isValidImage($image){
		$ext =  substr($image['name'],-3);
		if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG'|| $ext == 'gif' || $ext == 'GIF' || $ext == 'png' || $ext == 'PNG'){ return true; }
		else { return false; }
		
	}
	
	
	// Valid image size/dimension
	function isValidImage2($image,$maxWidth,$maxHeight){
		$maxSize = $maxSizeMB*1000000;
		$x= getimagesize($image['tmp_name']);
		if($x[0]>$maxWidth){ return false; }
		if($x[1]>$maxHeight){ return false; }
		if($image['size']==0){ return false; }
		$ext =  substr($image['name'],-3);
		if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG'|| $ext == 'gif' || $ext == 'GIF' || $ext == 'png' || $ext == 'PNG'){ }
		else { return false; }
		return true;
	}
	
	
	// Valid email address
	function isValidEmail($email) {
		// First, we check that there's one @ symbol, and that the lengths are right
		if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
			return false;
		}
	
		// Split it into sections to make life easier
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		
		for ($i = 0; $i < sizeof($local_array); $i++) {
			if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
				return false;
			}
		}
	
		if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
			$domain_array = explode(".", $email_array[1]);
			if (sizeof($domain_array) < 2) {
				return false; // Not enough parts to domain
			}
	
			for ($i = 0; $i < sizeof($domain_array); $i++) {
				if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
					return false;
				}
			}
		}
	
		return true;
	}
	
	
	// Autoresponder
	public function autoResponder($to,$subject,$message,$fromName='',$fromEmail='',$bcc=''){
		$header  ="MIME-Version: 1.0\n";
		$header .= "Content-type: text/html; charset=iso-8859-1\n";
		if($bcc!=''){ $header .= 'Bcc: '.$bcc . "\r\n"; }
		
		$emailHeader='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Untitled Document</title>
		</head>
		
		<body>
		<center>
		<table cellpadding="0" cellspacing="0" border="0" bgcolor="#d1d1d1">
		<tr>
		<td>
		<table width="600" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff">
		<tr>
		<td><a href="'.BASE_URL.'"><img src="'.BASE_URL.'/images/email-header.jpg" border="0" /></a></td>
		</tr>
		<tr>
		<td align="left">';
		
		$emailFooter='
		</td>
		</tr>
		</table>
		</td>
		</tr>
		</table>
		<table width="600" cellpadding="8" cellspacing="0" border="0" bgcolor="#ffffff">
		<tr>
		<td align="center">&copy;' . date("Y") . ' ' . BASE_URL . '</td>
		</tr>
		</table>
		</center>
		</body>
		</html>';

		if($fromName!=''){ $header .= "From: ".$fromName." <" . $fromEmail . ">\r\n"; }
		else { $header .= "From: " . FROM_EMAIL_NAME . " <". FROM_EMAIL . ">\r\n"; }
		mail($to, $subject, $emailHeader.$message.$emailFooter, $header);
	}
	
	
	// Set landmark
	function setLandmark(){
		setcookie('lastLandmark','http://www.openhusegetaways.com'.$_SERVER['REQUEST_URI']);	
	}
	
	// Set landmark
	function setOverview(){
		setcookie('lastOverview','http://www.openhusegetaways.com'.$_SERVER['REQUEST_URI']);	
	}
	
	
	// Paginate
	function paginate($totRecords,$perPage,$currentPage=''){
		if($currentPage==''){ $currentPage=1; }
		$totalPages = ceil($totRecords/$perPage);
		$i=0;
		$p=1;
		$startRec = (($currentPage-1)*$perPage)+1;
		if(($currentPage*$perPage) < $totRecords){ $endRec = $currentPage*$perPage; }
		else { $endRec = $totRecords; }
	
		echo '<div class="pagination">'."\n";
		echo '<p>Viewing <strong>'.$startRec.'-'.$endRec.'</strong> of <strong>'.$totRecords.'</strong></p>';
	
		if($totalPages>1){
		
			
			echo '<ul>'."\n";
			echo '<li>Page</li>'."\n";
			
			while($i<$totalPages){
				if($p==$currentPage){ echo '<li class="active"><a href="'.$baseURL.'">'.$p.'</a></li>'."\n"; }
				else { echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page='.$p.'">'.$p.'</a></li>'."\n"; }
				$i++;
				$p++;
			}
			
			echo '</ul>'."\n";
			
			
			
		}
		echo '<div class="clear"></div>';
		echo '</div>'."\n";
	}
	
	
	
	### SESSION ##########
	function setSession($vars=''){
		if(substr_count(@$vars['HTTP_REFERER'],'?')>0){ 
			$refArray = explode('?',$vars['HTTP_REFERER']);
		}
		else $refArray[0] = @$vars['HTTP_REFERER'];
		
		if(@$_POST['sentForm-search']=='y'){
			$_SESSION['searchStr']=$_POST['searchStr'];
			$_SESSION['searchField']=$_POST['searchField'];
			unset($_SESSION['filterArray']);
			unset($_SESSION['orderBy']);
			unset($_SESSION['sort']);
			unset($_SESSION['dateSearch']);
		}
		if($_POST['sentForm-filter']=='y' && !isset($_POST['sentForm-clear'])){
			$_SESSION['filterArray']=$_POST;
			unset($_SESSION['searchStr']);
			unset($_SESSION['searchField']);
			unset($_SESSION['orderBy']);
			unset($_SESSION['sort']);
			unset($_SESSION['dateSearch']);
		}
		if(@$_POST['sentForm-clear']!=''){
			unset($_SESSION['searchStr']);
			unset($_SESSION['searchField']);
			unset($_SESSION['filterArray']);
			unset($_SESSION['orderBy']);
			unset($_SESSION['sort']);
			unset($_SESSION['dateSearch']);
		}
		if(@$_COOKIE['ohgLandmark'] != $vars['SCRIPT_NAME'] || @$_COOKIE['ohgLandmark']=='' || @!$_COOKIE['ohgLandmark']){
			setcookie ('ohgLandmark', $vars['SCRIPT_NAME']);
			//echo "Trigger";
			unset($_SESSION['searchStr']);
			unset($_SESSION['searchField']);
			unset($_SESSION['filterArray']);
			unset($_SESSION['orderBy']);
			unset($_SESSION['sort']);
			unset($_SESSION['dateSearch']);
			
		}
	}
	
	function setSortVars($vars){
		unset($_SESSION['orderBy']);
		unset($_SESSION['sort']);
		$_SESSION['orderBy'] = $_GET['orderBy'];
		$_SESSION['sort'] = $_GET['sort'];
	}
	
	function sortHeader($fieldName,$displayName){
		if($_GET['p']==1){ $p = '&p=1'; } else {  }
		if($_SESSION['orderBy']==$fieldName){
			if($_SESSION['sort']=='asc'){ $newSort = 'desc'; } else { $newSort = 'asc'; }
			echo '<a href="'.$_SERVER['SCRIPT_NAME'].'?orderBy='.$fieldName.'&sort='.$newSort.$p.'" class="arrow-'.$_SESSION['sort'].'">'.$displayName.'</a>';
		}
		else { echo '<a href="'.$_SERVER['SCRIPT_NAME'].'?orderBy='.$fieldName.'&sort=asc'.$p.'" class="sort">'.$displayName.'</a>'; }
	}
	
	
	// cleaners
	function prepVars($array){
		$cleaned =array();
		foreach($array as $key=>$value){
			if(get_magic_quotes_gpc()){
				$value = stripslashes($value);
				$cleaned[$key] = mysql_real_escape_string($value);
				//echo $cleaned[$key];
			}
			else {
				$cleaned[$key] = mysql_real_escape_string($value);
				//echo $cleaned[$key];
			}		
		}
		return $cleaned;
	}
	
	function prepFormVars($array){
		$cleaned =array();
		foreach($array as $key=>$value){
			if(get_magic_quotes_gpc()){
				$value = stripslashes($value);
				$cleaned[$key] = htmlentities($value);
			}
			else {
				$cleaned[$key] = htmlentities($value);
			}		
		}
		return $cleaned;
		
	}


	// returns yotube id from share link
	public function extractYouTube($shareLink){

	}

	public function getVideoEmbed($videoURL, $width='',$height=''){
		if(substr_count($videoURL,'youtu.')>0){
			$pos = strrpos($videoURL, '/'); 
			$videoID =  substr($videoURL, $pos+1, 11);
			echo '<iframe width="' . $width . '" height="' . $height . '" src="//www.youtube.com/embed/' . $videoID . '?rel=0&modestbranding=1" frameborder="0" allowfullscreen></iframe>';
		}
		if(substr_count($videoURL,'youtube.')>0){
			$pos = strpos($videoURL, 'v=');  
			$videoID =  substr($videoURL, $pos+2,11);
			echo '<iframe width="' . $width . '" height="' . $height . '" src="//www.youtube.com/embed/' . $videoID . '?rel=0&modestbranding=1" frameborder="0" allowfullscreen></iframe>';
		}
		if(substr_count($videoURL,'vimeo')>0){
			$pos = strrpos($videoURL, '/');  
			$videoID =  substr($videoURL, $pos+1,8);
			echo '<iframe src="//player.vimeo.com/video/' . $videoID . '?title=0&amp;byline=0&amp;portrait=0" width="' . $width . '" height=" ' . $height . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		}
	}
	


	### SOCIAL MEDIA ##########

	function facebookLink($fundraiserName,$referrerText,$url){
		$caption = 'For participating in Open House Getaway\'s special fundraising promotion, ' . $fundraiserName . ' will receive $100!';
		$description = 'And you will receive a FREE 4 Star 7 Night Resort Stay on the Mexican Riviera valued up to $2,000! Click here for details';
		echo 'https://www.facebook.com/dialog/feed?app_id=' . FB_APP_ID . '&link=' . $url . '&picture='. BASE_URL .'/images/fb-thumb.jpg&name=Love Travel? Make a Difference and receive a FREE 7 Night Mexican Riviera Resort Vacation!&caption=' . $caption . '&description=' . urlencode($description) . '&redirect_uri='. BASE_URL;
	}

	function facebookLinkReferrer($referrerName,$url){
		$caption = 'You\'ll get a FREE 7-Night Mexican Riviera Resort Vacation';
		$description = 'For participating in our special fundraising promotion, ' . $referrerName . ' will receive a donation of $100 and as token of our appreciation for your time, you will receive a FREE 4 Star 7 night Vacation to the Mexican Riviera alued up to $2,000!';
		echo 'https://www.facebook.com/dialog/feed?app_id=' . FB_APP_ID . '&link=' . $url . '&picture='. BASE_URL .'/images/fb-thumb.jpg&name=Support%20' . $referrerName . '&caption=' . $caption . '&description=' . urlencode($description) . '&redirect_uri='. BASE_URL;
	}

	function twitterLink($fundraiserName,$url){
		$text = 'Love Travel? Help ' . $fundraiserName . ' and receive a FREE 7 Night Mexican Riviera Resort Vacation!';
		//$text = str_replace(' ','%20',$text);
		echo 'https://twitter.com/intent/tweet?text=' . urlencode($text) . '&url=' . $url . '&related=';
	}

	function twitterLinkReferrer($referrerName,$url){
		$text = 'Wanna help ' . $referrerName .' and get a FREE 7-Night Mexican Riviera Resort Vacation?';
		//$text = str_replace(' ','%20',$text);
		echo 'https://twitter.com/intent/tweet?text=' . urlencode($text) . '&url=' . $url . '&related=';
	}

	function googlePlusLink($url){
		echo 'https://plus.google.com/share?url='.$url;
	}

	### END SOCIAL MEDIA ##########


	### CONTACT ##########

	// send contact form detials
	public function doContactForm($vars){
		$message = '<p>You have received a message from the website.</p>';
		$message .= '<p><strong>Name:</strong> ' . @$vars['name'].'<br />';
		$message .= '<strong>Phone:</strong> ' . @$vars['phone'] . '<br />';
		$message .= '<strong>Message:</strong> ' . nl2br(@$vars['message']) . '</p>';

		Utility::autoResponder(CONTACT_EMAIL,'Contact from website',$message,$vars['name'],$vars['email']);
	}

	### END CONTACT ##########



	
}


