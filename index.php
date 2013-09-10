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
		
		<style type="text/css">
			/*
			 * rxtk styles
			 *
			 * based on "reset soup"
			 * http://gist.github.com/549156
			 *
			 */


			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
			 * Eric Meyer's "Resetting Again"
			 * http://meyerweb.com/eric/thoughts/2008/01/15/resetting-again/
			 * The big daddy of resets. I use this as a base.
			 */

			html, body, div, span, applet, object, iframe,
			h1, h2, h3, h4, h5, h6, p, blockquote, pre,
			a, abbr, acronym, address, big, cite, code,
			del, dfn, em, font, img, ins, kbd, q, s, samp,
			small, strike, strong, sub, sup, tt, var,
			b, u, i, center,
			dl, dt, dd, ol, ul, li,
			fieldset, form, label, legend,
			table, caption, tbody, tfoot, thead, tr, th, td {
				margin: 0;
				padding: 0;
				border: 0;
				outline: 0;
				font-size: 100%;
				vertical-align: baseline;
				background: transparent;
			}
			body {
				line-height: 1;
			}
			ol, ul {
				list-style: none;
			}
			blockquote, q {
				quotes: none;
			}

			/* remember to define focus styles! */
			:focus {
				outline: 0;
			}

			/* remember to highlight inserts somehow! */
			ins {
				text-decoration: none;
			}
			del {
				text-decoration: line-through;
			}

			/* tables still need 'cellspacing="0"' in the markup */
			table {
				border-collapse: collapse;
				border-spacing: 0;
			}


			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
			 * Fix IE's ghastly image scaling
			 * http://www.joelonsoftware.com/items/2008/12/22.html (and a million others)
			 */

			img {
				-ms-interpolation-mode:bicubic;
			}


			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
			 * Fix WebKit's "background bleed"
			 * http://tumble.sneak.co.nz/post/928998513/fixing-the-background-bleed
			 */

			.textbox, .button, .input-section {
				-webkit-background-clip: padding-box;
			}


			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
			 * Clearfix
			 * http://css-tricks.com/snippets/css/clear-fix/
			 */

			.clearfix:after {
				visibility: hidden;
				display: block;
				font-size: 0;
				content: " ";
				clear: both;
				height: 0;
			}
			.clearfix { display: inline-block; }
			/* start commented backslash hack \*/
			* html .clearfix { height: 1%; }
			.clearfix { display: block; }
			/* close commented backslash hack */


			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
			 * Ensure "pointer" cursor on clickable elements
			 * http://css-tricks.com/snippets/css/give-clickable-elements-a-pointer-cursor/
			 */

			a[href], input[type='submit'], input[type='image'], label[for], select, button, .pointer {
				cursor: pointer;
			}

			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
			 * Prevent <sup> and <sub> from affecting line-height
			 * http://css-tricks.com/snippets/css/prevent-superscripts-and-subscripts-from-affecting-line-height/
			 */

			sup, sub {
				vertical-align: baseline;
				position: relative;
				top: -0.4em;
			}
			sub { top: 0.4em; }

			/*
			 * Main styles
			 */

			body {
				font-family: Verdana, sans-serif;
				color: #555;
				font-size: 9pt;
			}

			h1 {
				font-family: Georgia, serif;
				font-size: 24pt;
			}

			h3 {
				font-weight: bold;
				font-size: 12pt;
			}

			h3 {
				font-weight: bold;
				font-size: 9pt;
			}

			a, a:visited, a:link {
				color: inherit;
				text-decoration: none;
				border-bottom: 1px dotted #ccc;
			}

			a:hover {
				border-bottom: 0;
			}

			#rap {
				width: 700px;
				margin: 10px auto 10px auto;
				min-height: 400px;
			}

			#input-container {
				width: 700px;
				float: left;
				margin-top: 20px;
				border-bottom: 1px #eee solid;
			}

			.input-section, .output-section {
				float: left;
				padding: 10px 0;
				margin: 2px;
				min-height: 110px;
				-webkit-border-radius: 3px;
				-moz-border-radius: 3px;
				border-radius: 3px;
			}

			.input-section h3, .output-section h3 {
				margin-bottom: 10px;
			}

			#regex-input {
				width: 59%;
				border-right: 1px #eee solid;
			}

			#regex-input textarea {
				width: 95%;
				margin-bottom: 10px;
			}

			#regex-input h3.inline {
				display: inline;
			}

			#regex-input input.textbox {
				display: inline;
				text-align: center;
			}

			#regex-input input.button {
				float: right;
				margin-right: 2%;
			}

			#options-input {
				width: 39%;
				clear: right;
			}

			#options-input .option-col {
				width: 120px;
				float: left;
				font-size: 7pt;
				margin-right: 5px;
			}

			#options-input .option-col-last {
				margin-right: 0;
			}

			#options-input .option-col label {
				display: block;
			}


			#sample-input textarea {
				width: 98%;
			}

			.textbox, .button {
				-webkit-border-radius: 3px;
				-moz-border-radius: 3px;
				border-radius: 3px;
				border: 1px #eee solid;
				padding: 5px;
				background-color: #f5f5f5;
			}

			.button {
				font-weight: bold;
				background-color: #efefef;
				border: 2px #ddd solid;
			}

			#result-output, #result-match, #sample-input {
				clear: both;
				width: 100%;
			}

			#result-output-inner {
				-webkit-border-radius: 3px;
				-moz-border-radius: 3px;
				border-radius: 3px;
				border: 1px #eee solid;
				padding: 5px;
				background-color: #fefefe;
				width: 98%;
				min-height: 110px;
				line-height: 120%;
			}
			
			#result-match-inner code > span > span:first-child {
				display: none;
			}

			span.match {
				background-color: #f5e881;
			}

			#error-output {
				clear: both;
				width: 100%;
				min-height: 50px;
			}

			#error-output-inner {
				-webkit-border-radius: 3px;
				-moz-border-radius: 3px;
				border-radius: 3px;
				border: 1px #f00 solid;
				padding: 5px;
				background-color: #fefefe;
				width: 98%;
				min-height: 50px;
			}

			#footer {
				text-align: center;
				color: #aaa;
				font-size: 7pt;
				padding: 5px 0 5px 0;
				clear: both;
			}
	</style>
	</head>
	<body>

		<div id='rap'>
			<h1>rxtk</h1>
			<h2>php regular expression toolkit</h2>
			
			<br />
			<a href='<?php echo basename($_SERVER['SCRIPT_NAME']); ?>?demo'>Demo</a>
			
			<?php
				function escape($str) {
					return str_replace('\\', '\\\\', $str);
				}
				$aMods = array('i' => 'case-insensitive', 'm' => 'multiline', 's' => 'dot matches all', 'x' => 'extended mode', 'A' => 'anchored', 'D' => 'dollar end-only', 'U' => 'ungreedy', 'u' => 'utf-8 mode');
				$i = 0;
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$strSampleText = stripslashes($_POST['sample-text']);
					$strRegex = stripslashes($_POST['regex']);
					$strDelimiter = stripslashes($_POST['delimiter']);
					$aModifiers = $_POST['mod'];
				}
				else {
					// default options
					if (isset($_GET['demo'])) {
						$strSampleText = "Enter your sample text here.\nThis is the text to which the regex will be applied.\nEnter your regex below.\nIf your regex text contains the delimiter character, you may wish to change the delimiter.\nHit the button, and see the results!";
						$strRegex = "(^|\W)text(\W|$)";
						$strDelimiter = "/";
					}
					$aModifiers = array("i", "m", "s");
				}
				if (isset($strRegex)) {
					$strResult = preg_replace($strDelimiter.$strRegex.$strDelimiter.implode("", $aModifiers), "<span class='match'>$0</span>", $strSampleText);
					preg_match_all($strDelimiter.$strRegex.$strDelimiter.implode("", $aModifiers), $strSampleText, $aResult, PREG_SET_ORDER);
				}
			?>
			
			<div id='input-container'>
				<form action='<?php echo basename($_SERVER['SCRIPT_NAME']); ?>' method='post'>
					
					<div id='regex-input' class='input-section'>
						<h3>
							<a href='http://www.php.net/manual/en/book.pcre.php'>PCRE Regular Expression</a>
						</h3>
						<textarea name='regex' rows='3' class='textbox'><?php if (isset($strRegex)) { echo escape($strRegex); } ?></textarea>
						<h3 class='inline'><a href='http://www.php.net/manual/en/regexp.reference.delimiters.php'>Delimiter</a>:</h3>&nbsp;
						<input type='text' name='delimiter' class='textbox' size='1' maxlength='1' value='<?php if (isset($strDelimiter)) { echo escape($strDelimiter); } else { echo '/'; } ?>' />
						<input type='submit' name='submit' value=' Test ' class='button' />
					</div>
					
					<div id='options-input' class='input-section'>
						<h3>
							<a href='http://www.php.net/manual/en/reference.pcre.pattern.modifiers.php'>Modifiers</a>
						</h3>
						<?php foreach ($aMods as $sMod => $sModDescr): ?>
						
						<?php if ($i % 4 == 0): ?><div class='option-col'><?php endif; ?>

							<label for='check-mod-<?php echo $sMod; ?>'>
								<input type='checkbox' name='mod[]' value='<?php echo $sMod; ?>' id='check-mod-<?php echo $sMod; ?>' <?php if (array_search($sMod, $aModifiers) !== false) { echo "checked='checked' "; } ?>/>
								<?php echo $sMod; ?> (<?php echo $sModDescr; ?>)
							</label>

						<?php if (++$i % 4 == 0): ?></div><?php endif; ?>
						
						<?php endforeach; ?>
						
					</div>

					<div id='sample-input' class='input-section'>
						<h3>
							Sample Text
						</h3>
						<textarea name='sample-text' class='textbox' rows='10'><?php if (isset($strSampleText)) { echo escape($strSampleText); } ?></textarea>
					</div>

				</form>
			</div>
			
			<div id='result-output' class='output-section'>
				<h3>
					Result Text
				</h3>
				<div id='result-output-inner' contenteditable>
					<?php if (isset($strResult)) { echo nl2br($strResult); } ?>
				</div>
			</div>
			<div id='result-match' class='output-section'>
				<h3>
					Result Match
				</h3>
				<div id='result-match-inner'>
					<?php if (isset($aResult)) { highlight_string('<?='.var_export($aResult, 1)); } ?>
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
				<a href='http://github.com/BigglesZX/rxtk'>rxtk</a> by <a href='http://github.com/BigglesZX/'>BigglesZX</a> <a href='https://github.com/gtgt/rxtk'>GT</a> | <a href='http://github.com/BigglesZX/rxtk'>fork me</a> on <a href='http://github.com/'>github!</a>
				<br /><br />
			</div>
		</div>
		
	</body>
</html>
