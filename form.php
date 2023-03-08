<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Form Page | Made by Jamie</title>
</head>

<body>
     <link rel="stylesheet" type="text/css" href="form.css" />

     <form method="post" action="processform.php">

          <label for="">Title:</label>
          <select id="title" name="title">
               <option value="Mr">Mr:</option>
               <option value="Mis">Mis:</option>
               <option value="Miss">Miss:</option>
               <option value="Other">Other:</option>
          </select>
          <br />
          <label for="username">Personal Name:</label>
          <input type="text" name="username" id="username" placeholder="Enter Personal Name:" required />

          <label for="emailadd">Email:</label>
          <input type="email" name="emailadd" id="emailadd" placeholder="Enter Email:" required />

          <label for="dob">DOB:</label>
          <input type="date" name="dob" id="dob" placeholder="Enter Date of Birth:" required />

          <label for="userpass">Password:</label>
          <input type="Password" name="userpass" id="userpass" placeholder="Enter Password:" required />

          <label for="userpass">Extra Information:</label>
          <textarea cols="20" rows="6" type="Password" name="textaredemo" id="textaredemo" placeholder="Extra Information:"></textarea>

          <fieldset>
               <legend>Would you like to sign up for our newsletter?</legend>
               <div>
                    <input class="radio-input" type="radio" name="gen" value="yes" />
                    <label class="radio-label">Yes:</label>
                    <input class="radio-input" type="radio" name="gen" value="yes" />
                    <label class="radio-label">No:</label>
               </div>
          </fieldset>

          <button type="submit">Send Form:</button>
          <br />
          <button type="reset">Reset Form:</button>
</body>