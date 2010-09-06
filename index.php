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
					$strSampleText = stripslashes($_POST['sample-text']);
					$strRegex = stripslashes($_POST['regex']);
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
					
					$strResult = preg_replace($strDelimiter.$strRegex.$strDelimiter.$strModifiers, "<span class='match'>$0</span>", $strSampleText);
				}
				else {
					// default options
					$blnModI = true;
					$blnModM = true;
					$blnModS = true;
					
					if (isset($_GET['demo'])) {
						$strSampleText = "Enter your sample text here.\nThis is the text to which the regex will be applied.\nEnter your regex below.\nIf your regex text contains the delimiter character, you may wish to change the delimiter.\nHit the button, and see the results!";
						$strRegex = "(^|\W)text(\W|$)";
						$strDelimiter = "/";						
						$strResult = preg_replace($strDelimiter.$strRegex.$strDelimiter.'ims', "<span class='match'>$0</span>", $strSampleText);
					}
				}
			
			?>
			
			<div id='input-container'>
				<form action='<?php echo basename($_SERVER['SCRIPT_NAME']); ?>' method='post'>
					<div id='sample-input' class='input-section'>
						<h3>
							Sample Text
						</h3>
						<textarea name='sample-text' class='textbox' rows='10'><?php if (isset($strSampleText)) { echo $strSampleText; } ?></textarea>
					</div>
					
					<div id='regex-input' class='input-section'>
						<h3>
							<a href='http://www.php.net/manual/en/book.pcre.php'>PCRE Regular Expression</a>
						</h3>
						<textarea name='regex' rows='3' class='textbox'><?php if (isset($strRegex)) { echo $strRegex; } ?></textarea>
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