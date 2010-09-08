<?php
	error_reporting(E_ALL);
	header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title> rxtk | php regular expression toolkit </title>

		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
						
		<meta http-equiv="imagetoolbar" content="no" /> 
		
		<link rel='stylesheet' href='style.css' type='text/css' media='screen' />
		
		<script src='jquery-1.4.2.min.js' type='text/javascript'></script>
		
		<script src='js.js' type='text/javascript'></script>
	</head>
	<body>

		<div id='rap'>
			<h1>
				rxtk
			</h1>
			
			<br />
			<a href='<?php echo basename($_SERVER['SCRIPT_NAME']); ?>?demo'>Demo</a>
			
			<?php
			
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$strSampleText1 = stripslashes($_POST['sample-text-1']);
					$strSampleText2 = stripslashes($_POST['sample-text-2']);
					$strSampleText3 = stripslashes($_POST['sample-text-3']);
					$strSampleText4 = stripslashes($_POST['sample-text-4']);
					$strRegex1 = stripslashes($_POST['regex-1']);
					$strRegex2 = stripslashes($_POST['regex-2']);
					$strRegex3 = stripslashes($_POST['regex-3']);
					$strRegex4 = stripslashes($_POST['regex-4']);
					$intSampleActive = intval($_POST['sample-active']);
					$intRegexActive = intval($_POST['regex-active']);
					$strDelimiter = stripslashes($_POST['delimiter']);
					$blnModI = isset($_POST['mod-i']);
					$blnModM = isset($_POST['mod-m']);
					$blnModS = isset($_POST['mod-s']);
					$blnModX = isset($_POST['mod-x']);
					$blnModA = isset($_POST['mod-a']);
					$blnModD = isset($_POST['mod-d']);
					$blnModU = isset($_POST['mod-u']);
					$blnModU2 = isset($_POST['mod-u2']);
					
					$strModifiers = '';
					if ($blnModI) { $strModifiers .= 'i'; }
					if ($blnModM) { $strModifiers .= 'm'; }
					if ($blnModS) { $strModifiers .= 's'; }
					if ($blnModX) { $strModifiers .= 's'; }
					if ($blnModA) { $strModifiers .= 'A'; }
					if ($blnModD) { $strModifiers .= 'D'; }
					if ($blnModU) { $strModifiers .= 'U'; }
					if ($blnModU2) { $strModifiers .= 'u'; }
					
					$strResult = preg_replace($strDelimiter.${'strRegex'.$intRegexActive}.$strDelimiter.$strModifiers, "<span class='match'>$0</span>", ${'strSampleText'.$intSampleActive});
				}
				else {
					// default options
					$blnModI = true;
					$blnModM = true;
					$blnModS = true;
					
					if (isset($_GET['demo'])) {
						$strSampleText1 = "Enter your sample text here.\nThis is the text to which the regex will be applied.\nYou can use the number selectors above to switch between different sample texts.\nEnter your regex below.\nIf your regex text contains the delimiter character, you may wish to change the delimiter.\nHit the button, and see the results!";
						$intSampleActive = 1;
						$intRegexActive = 1;
						$strRegex1 = "(^|\W)text(\W|$)";
						$strDelimiter = "/";						
						$strResult = preg_replace($strDelimiter.$strRegex1.$strDelimiter.'ims', "<span class='match'>$0</span>", $strSampleText1);
					}
				}
			
			?>
			
			<div id='input-container'>
				<form action='<?php echo basename($_SERVER['SCRIPT_NAME']); ?>' method='post'>
					<div id='sample-input' class='input-section'>
						<h3 class='inline'>
							Sample Text
						</h3>
						<label for='sample-switcher-1'>
							<input type='radio' name='sample-active' value='1' id='sample-switcher-1' class='sample-switcher' <?php if (!isset($intSampleActive) || (isset($intSampleActive) && $intSampleActive == 1)) { echo "checked='checked' "; } ?>/>1
						</label>
						<label for='sample-switcher-2'>
							<input type='radio' name='sample-active' value='2' id='sample-switcher-2' class='sample-switcher' <?php if (!isset($intSampleActive) || (isset($intSampleActive) && $intSampleActive == 2)) { echo "checked='checked' "; } ?>/>2
						</label>
						<label for='sample-switcher-3'>
							<input type='radio' name='sample-active' value='3' id='sample-switcher-3' class='sample-switcher' <?php if (!isset($intSampleActive) || (isset($intSampleActive) && $intSampleActive == 3)) { echo "checked='checked' "; } ?>/>3
						</label>
						<label for='sample-switcher-4'>
							<input type='radio' name='sample-active' value='4' id='sample-switcher-4' class='sample-switcher' <?php if (!isset($intSampleActive) || (isset($intSampleActive) && $intSampleActive == 4)) { echo "checked='checked' "; } ?>/>4
						</label>
						<textarea name='sample-text-1' id='sample-text-1' class='textbox sample-textbox' rows='10'><?php if (isset($strSampleText1)) { echo $strSampleText1; } ?></textarea>
						<textarea name='sample-text-2' id='sample-text-2' class='textbox sample-textbox' rows='10' style='display: none;'><?php if (isset($strSampleText2)) { echo $strSampleText2; } ?></textarea>
						<textarea name='sample-text-3' id='sample-text-3' class='textbox sample-textbox' rows='10' style='display: none;'><?php if (isset($strSampleText3)) { echo $strSampleText3; } ?></textarea>
						<textarea name='sample-text-4' id='sample-text-4' class='textbox sample-textbox' rows='10' style='display: none;'><?php if (isset($strSampleText4)) { echo $strSampleText4; } ?></textarea>
					</div>
					
					<div id='regex-input' class='input-section'>
						<h3 class='inline'>
							<a href='http://www.php.net/manual/en/book.pcre.php'>PCRE Regular Expression</a>
						</h3>
						<label for='regex-switcher-1'>
							<input type='radio' name='regex-active' value='1' id='regex-switcher-1' class='regex-switcher' <?php if (!isset($intRegexActive) || (isset($intRegexActive) && $intRegexActive == 1)) { echo "checked='checked' "; } ?>/>1
						</label>
						<label for='regex-switcher-2'>
							<input type='radio' name='regex-active' value='2' id='regex-switcher-2' class='regex-switcher' <?php if (!isset($intRegexActive) || (isset($intRegexActive) && $intRegexActive == 2)) { echo "checked='checked' "; } ?>/>2
						</label>
						<label for='regex-switcher-3'>
							<input type='radio' name='regex-active' value='3' id='regex-switcher-3' class='regex-switcher' <?php if (!isset($intRegexActive) || (isset($intRegexActive) && $intRegexActive == 3)) { echo "checked='checked' "; } ?>/>3
						</label>
						<label for='regex-switcher-4'>
							<input type='radio' name='regex-active' value='4' id='regex-switcher-4' class='regex-switcher' <?php if (!isset($intRegexActive) || (isset($intRegexActive) && $intRegexActive == 4)) { echo "checked='checked' "; } ?>/>4
						</label>
						<textarea name='regex-1' id='regex-1' rows='3' class='textbox regex-textbox'><?php if (isset($strRegex1)) { echo $strRegex1; } ?></textarea>
						<textarea name='regex-2' id='regex-2' rows='3' class='textbox regex-textbox' style='display: none;'><?php if (isset($strRegex2)) { echo $strRegex2; } ?></textarea>
						<textarea name='regex-3' id='regex-3' rows='3' class='textbox regex-textbox' style='display: none;'><?php if (isset($strRegex3)) { echo $strRegex3; } ?></textarea>
						<textarea name='regex-4' id='regex-4' rows='3' class='textbox regex-textbox' style='display: none;'><?php if (isset($strRegex4)) { echo $strRegex4; } ?></textarea>
						<h3 class='inline'><a href='http://www.php.net/manual/en/regexp.reference.delimiters.php'>Delimiter</a>:</h3>&nbsp;
						<input type='text' name='delimiter' class='textbox' size='1' maxlength='1' value='<?php if (isset($strDelimiter)) { echo $strDelimiter; } else { echo '/'; } ?>' />
						<input type='submit' name='submit' value=' Test ' class='button' />
					</div>
					
					<div id='options-input' class='input-section'>
						<h3>
							<a href='http://www.php.net/manual/en/reference.pcre.pattern.modifiers.php'>Modifiers</a>
						</h3>
						<div class='option-col'>
							<label for='check-mod-i'>
								<input type='checkbox' name='mod-i' id='check-mod-i' <?php if (@$blnModI) { echo "checked='checked' "; } ?>/>
								i (case-insensitive)
							</label>
							<label for='check-mod-m'>
								<input type='checkbox' name='mod-m' id='check-mod-m' <?php if (@$blnModM) { echo "checked='checked' "; } ?>/>
								m (multiline)
							</label>
							<label for='check-mod-s'>
								<input type='checkbox' name='mod-s' id='check-mod-s' <?php if (@$blnModS) { echo "checked='checked' "; } ?>/>
								s (dot matches all)
							</label>
							<label for='check-mod-x'>
								<input type='checkbox' name='mod-x' id='check-mod-x' <?php if (@$blnModX) { echo "checked='checked' "; } ?>/>
								x (extended mode)
							</label>
						</div>
						<div class='option-col option-col-last'>
							<label for='check-mod-a'>
								<input type='checkbox' name='mod-a' id='check-mod-a' <?php if (@$blnModA) { echo "checked='checked' "; } ?>/>
								A (anchored)
							</label>
							<label for='check-mod-d'>
								<input type='checkbox' name='mod-d' id='check-mod-d' <?php if (@$blnModD) { echo "checked='checked' "; } ?>/>
								D (dollar end-only)
							</label>
							<label for='check-mod-u'>
								<input type='checkbox' name='mod-u' id='check-mod-u' <?php if (@$blnModU) { echo "checked='checked' "; } ?>/>
								U (ungreedy)
							</label>
							<label for='check-mod-u2'>
								<input type='checkbox' name='mod-u2' id='check-mod-u2' <?php if (@$blnModU2) { echo "checked='checked' "; } ?>/>
								u (utf-8 mode)
							</label>
						</div>
					</div>
				</form>
			</div>
			
			<div id='result-output' class='output-section'>
				<h3>
					Result Text
				</h3>
				<div id='result-output-inner'>
					<?php if (isset($strResult)) { echo nl2br($strResult); } ?>
				</div>
			</div>
			<!--
			<div id='error-output' class='output-section'>
				<h3>
					PHP Errors
				</h3>
				<div id='error-output-inner'>
					
				</div>
			</div>
			-->
			
			<div id='footer'>
				<br /><br />
				<a href='http://github.com/BigglesZX/rxtk'>rxtk</a> by <a href='http://github.com/BigglesZX/'>BigglesZX</a> | <a href='http://github.com/BigglesZX/rxtk'>fork me</a> on <a href='http://github.com/'>github!</a>
				<br /><br />
			</div>
		</div>
		
	</body>
</html>