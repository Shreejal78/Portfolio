<?php
require_once 'auth.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio Form</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Outfit", sans-serif;
    }

    body {
      min-height: 100vh;
      gap: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      background:
        radial-gradient(circle at top right, #8b5cf655, transparent 30%),
        radial-gradient(circle at bottom left, #ec489955, transparent 30%),
        #0f0f1b;
      padding: 30px;
    }

    .form-box {
      width: 450px;
      background: #181826;
      border-radius: 22px;
      padding: 40px;
      border: 1px solid rgba(255, 255, 255, 0.08);
      box-shadow:
        0 20px 60px rgba(0, 0, 0, 0.45),
        0 0 25px rgba(168, 85, 247, 0.15);
    }

    .title {
      text-align: center;
      color: white;
      margin-top: 20px;
      font-size: 30px;
      font-weight: 700;
    }

    .subtitle {
      text-align: center;
      color: #9ca3af;
      margin: 8px 0 30px;
      font-size: 14px;
    }

    .input-group {
      margin-bottom: 22px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #d1d5db;
      font-size: 14px;
      font-weight: 500;
    }

    input,
    textarea {
      width: 100%;
      background: #232336;
      border: 2px solid transparent;
      border-radius: 14px;
      padding: 15px 18px;
      color: white;
      font-size: 15px;
      outline: none;
      transition: 0.3s;
    }

    textarea {
      resize: none;
      min-height: 140px;
    }

    input::placeholder,
    textarea::placeholder {
      color: #7b8192;
    }

    input:focus,
    textarea:focus {
      border-color: #a855f7;
      box-shadow: 0 0 20px rgba(168, 85, 247, 0.3);
    }

    #done {
      width: 100%;
      padding: 15px;
      border: none;
      border-radius: 14px;
      cursor: pointer;
      color: white;
      font-size: 16px;
      font-weight: 600;
      background: linear-gradient(135deg, #8b5cf6, #ec4899);
      transition: 0.3s;
    }

    #done:hover {
      transform: translateY(-4px);
      box-shadow: 0 15px 30px rgba(236, 72, 153, 0.35);
    }

    #done:active {
      transform: scale(0.98);
    }

    @media (max-width: 520px) {
      .form-box {
        width: 100%;
        padding: 30px;
      }
    }


    .topUrl {
      text-decoration: none;
      font-family: cursive;
      color: white;
      font-size: 24px;
      position: absolute;
    }

    .topUrl::before {
      content: "";
      position: absolute;
      left: 0;
      bottom: -5px;
      width: 100%;
      height: 3px;
      background: linear-gradient(90deg,
          #a78bfa,
          #8b5cf6);

      transform: scaleX(0);
      transform-origin: center;
      transition: transform 250ms ease;
    }

    .topUrl:hover::before {
      transform: scaleX(1);
    }

    .homePage {
      top: 10px;
      color: #e38c1a;
      left: 20px;
    }

    .nxtForm {
      bottom: 10px;
      color: #5fcead;
      right: 20px;
    }

    #logOut {
      position: absolute;
      top: 10px;
      right: 10px;
      border: 2px dashed orangered;
      background: red;
      font-size: 18px;
      font-weight: 600;
      padding: 5px 10px;
      font-family: Arial, Helvetica, sans-serif;
      color: white;
      border-radius: 10px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <button onclick="window.location.href = 'logout.php'" id="logOut">Log Out</button>
  <a href="index.php" class="homePage topUrl">Home</a>
  <a href="projectForm.php" class="nxtForm topUrl">Switch Form</a>
  <div class="form-box">
    <h1 class="title">Portfolio Form</h1>

    <p class="subtitle">Update your personal portfolio information</p>
    <?php
    require_once 'conn.php';
    $sql = "SELECT * FROM admin_details";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      ?>
      <input type="hidden" name="current_name" id="current_name" value="">
      <input type="hidden" name="current_skills" id="current_skills" value="">
      <input type="hidden" name="current_des" id="current_des" value="">
      <?php
    } else {
      while ($row = $result->fetch_assoc()) {
        ?>
        <input type="hidden" name="current_name" id="current_name" value="<?php echo $row['username'];?>">
        <input type="hidden" name="current_skills" id="current_skills" value="<?php echo $row['skills'];?>">
        <input type="hidden" name="current_des" id="current_des" value="<?php echo $row['description'];?>">
        <?php
      }
    }
    ?>
    <form action="insert.php" method="POST">
      <div class="input-group">
        <label>Name</label>
        <input id="inp_username" type="text" name="name" placeholder="Enter your name" required />
      </div>

      <div class="input-group">
        <label>Skills</label>
        <input type="text" id="inp_skills" name="skills" placeholder="Seperate Skills with a [#]" required />
      </div>

      <div class="input-group">
        <label>Description</label>
        <textarea name="des" id="inp_des" placeholder="Write something about yourself..." required></textarea>
      </div>

      <button type="submit" id="done">Done</button>
    </form>
  </div>

  <script>
      document.getElementById('inp_username').value = document.getElementById('current_name').value
      document.getElementById('inp_skills').value = document.getElementById('current_skills').value
      document.getElementById('inp_des').value = document.getElementById('current_des').value

  </script>
</body>

</html>