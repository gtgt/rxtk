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
			
			<div id='input-container'>
				<form action='<?php echo basename($_SERVER['SCRIPT_NAME']); ?>'>
					<div id='regex-input' class='input-section'>
						<h3>
							<a href='http://www.php.net/manual/en/book.pcre.php'>PCRE Regular Expression</a>
						</h3>
						<textarea name='regex' rows='3' class='textbox'></textarea>
					</div>
					
					<div id='options-input' class='input-section'>
						<h3>
							<a href='http://www.php.net/manual/en/reference.pcre.pattern.modifiers.php'>Modifiers</a>
						</h3>
						<div class='option-col'>
							<label for='check-mod-i'>
								<input type='checkbox' name='mod-i' id='check-mod-i' checked='checked' />
								i (case-insensitive)
							</label>
							<label for='check-mod-m'>
								<input type='checkbox' name='mod-m' id='check-mod-m' checked='checked' />
								m (multiline)
							</label>
							<label for='check-mod-s'>
								<input type='checkbox' name='mod-s' id='check-mod-s' checked='checked' />
								s (dot matches all)
							</label>
							<label for='check-mod-x'>
								<input type='checkbox' name='mod-x' id='check-mod-x' />
								x (extended mode)
							</label>
						</div>
						<div class='option-col option-col-last'>
							<label for='check-mod-a'>
								<input type='checkbox' name='mod-a' id='check-mod-a' />
								A (anchored)
							</label>
							<label for='check-mod-d'>
								<input type='checkbox' name='mod-d' id='check-mod-d' />
								D (dollar end-only)
							</label>
							<label for='check-mod-u'>
								<input type='checkbox' name='mod-u' id='check-mod-u' />
								U (ungreedy)
							</label>
							<label for='check-mod-u2'>
								<input type='checkbox' name='mod-u2' id='check-mod-u2' />
								u (utf-8 mode)
							</label>
						</div>
					</div>
					
					<div id='sample-input' class='input-section'>
					</div>
				</form>
			</div>
			
			<div id='result-output'>
			</div>
			<div id='error-output'>
			</div>
		</div>
		
	</body>
</html>