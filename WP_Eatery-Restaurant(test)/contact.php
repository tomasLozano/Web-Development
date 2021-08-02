<?php
	
	$name = "";
	$email = "";
	$phone = "";
	$referral = "";
	$hasError = false;
	$errorMessages = Array();
	$errorInput = Array();
	

	if(isset($_POST['customerName']) || isset($_POST['phoneNumber']) || isset($_POST['emailAddress'])){
            
                //Check if the name is not empty and is not  number
                if(is_numeric($_POST['customerName']) || $_POST['customerName'] == ""){
                    $hasError = true;
                    $errorMessages['nameError'] = '* Please enter a customer name.';
					$errorInput['inputError'] = 'There is an error saving the data, Please fill out the form.';
					$errorInput['inputGood'] = 'Added Successfully!';
                }
				
				//check if the phone number is not empty and is numeric
                if($_POST['phoneNumber'] == "" || !is_numeric($_POST['phoneNumber'])){
                    $errorMessages['phoneError'] = "* Please enter a Phone Number.";
					$errorInput['inputError'] = 'There is an error saving the data, Please fill out the form.';
					$errorInput['inputGood'] = 'Added Successfully!';
                    $hasError = true;
                }
				
				//Check if email is not empty
                if($_POST['emailAddress'] == ""){
                    $errorMessages['emailError'] = "* Please enter an Email Address.";
					$errorInput['inputError'] = 'There is an error saving the data, Please fill out the form.';
					$errorInput['inputGood'] = 'Added Successfully!';
                    $hasError = true;
                }				

                if(!$hasError){
                    
					$errorInput['inputGood'] = 'Added Successfully!';
										
					$name = $_POST['customerName'];
					$email = $_POST['emailAddress'];
					$phone = $_POST['phoneNumber'];
					$referral = $_POST['referral'];
					
					$database = new mysqli ("localhost", "wp_eatery", "password", "wp_eatery");
					$sql = "INSERT INTO mailinglist (customerName, emailAddress, phoneNumber, referrer) VALUES ('$name', '$email', '$phone', '$referral');";
					mysqli_query($database, $sql);
                }
            }
?>


<?php include("header.php"); ?>
            <div id="content" class="clearfix">
                <aside>
                        <h2>Mailing Address</h2>
                        <h3>1385 Woodroffe Ave<br>
                            Ottawa, ON K4C1A4</h3>
                        <h2>Phone Number</h2>
                        <h3>(613)727-4723</h3>
                        <h2>Fax Number</h2>
                        <h3>(613)555-1212</h3>
                        <h2>Email Address</h2>
                        <h3>info@wpeatery.com</h3>
                </aside>
                <div class="main">
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="frmNewsletter" id="frmNewsletter" method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>>
                        <table>
							<tr>
								<?php
								if(isset($_POST['customerName']) || isset($_POST['phoneNumber']) || isset($_POST['emailAddress'])){								
									if ($hasError) {echo '<span style=\'color:red\'>' . $errorInput['inputError'] . '</span>';} 
									if (!$hasError) {echo '<span style=\'color:white\'>' . $errorInput['inputGood'] . '</span>';}
								}
								?>
							</tr>
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" name="customerName" id="customerName" size='40'></td>
								<td><?php
									//If there is an error with the customer name field, display the message
									if(isset($errorMessages['nameError'])){
										echo '<span style=\'color:red\'>' . $errorMessages['nameError'] . '</span>';
									}?></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td><input type="text" name="phoneNumber" id="phoneNumber" size='40'></td>
								<td><?php
									//If there is an error with the phone number field, display the message
									if(isset($errorMessages['phoneError'])){
										echo '<span style=\'color:red\'>' . $errorMessages['phoneError'] . '</span>';
									}?></td>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="text" name="emailAddress" id="emailAddress" size='40'></td>
								<td><?php
									//If there is an error with the email field, display the message
									if(isset($errorMessages['emailError'])){
										echo '<span style=\'color:red\'>' . $errorMessages['emailError'] . '</span>';
									}?></td>
                            </tr>
                            <tr>
                                <td>How did you hear<br> about us?</td>
                                <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper">
                                    Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
                                    TV<input type='radio' name='referral' id='referralTV' value='TV'>
                                    Other<input type='radio' name='referral' id='referralOther' value='other'></td>
                            </tr>
                            <tr>
                                <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form">
								&nbsp;&nbsp;<input type="button" value="Mailing List" id="btnList" onClick="document.location.href= 'mailing_list.php'"></td>
                            </tr>
						</table>
                    </form>
                </div><!-- End Main -->
            </div><!-- End Content -->
<?php include("footer.php"); ?>
