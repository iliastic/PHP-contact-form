<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contact form</title>
    <link href="https://fonts.googleapis.com/css?family=MedievalSharp&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="page-wrapper">
  <h1>Contact Form</h1>
  <div id="form-messages"></div>
  <form id="ajax-contact" method="post" action="form.php">
    <div class="field">
      <label for="name">Name:</label>
      <input type="text" id="name" placeholder="Thy nameth" name="name">
      <span class="error"><?= $name_error ?></span>
    </div>
    <div class="field">
      <label for="email">Email-adress:</label>
      <input type="text" id="email" placeholder="posteth adres" name="email">
      <span class="error"><?= $email_error ?></span>
    </div>
    <div class="field">
      <label for="message">Message:</label>
      <textarea id="message" placeholder="heareth thee writeth thy message h're" type="text" name="message"></textarea>
    </div>
    <div class="field">
      <button class="brown-btn" type="submit">sendeth</button>
    </div>
  </form>
  <div class="succsess"><?=$success;?></div>
</div>
</body>
</html>