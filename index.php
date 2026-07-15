<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio</title>
  <link rel="shortcut icon" href="images/avatar.png" type="image/x-icon" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div id="home" class="pageSegments">
    <header>
      <p class="name">
        <?php
        require 'conn.php';

        $sql = "SELECT username FROM user";
        $result = $conn->query($sql);
        $words;
        while ($row = $result->fetch_assoc()) {
          $str = $row['username'];
          $words = preg_split('/\s+/', trim($str));
          echo '<span style="font-weight: 800">' . $words[0] . '</span>';
          echo trim($words[1]);
          $conn->close();
        }
        ?>

      </p>
      <div class="nav">
        <a class="subNav" href="#home">Home</a>
        <a class="subNav" href="#project">Projects</a>
        <a class="subNav" href="#about">About</a>
        <a class="subNav" href="#contact">Contacts</a>
        <a target="_blank" href="https://github.com/shreejal78" class="logo" id="git"></a>
        <a target="_blank" href="https://www.linkedin.com/in/shreejal-bro-760199422/" class="logo" id="li"></a>
        <a target="_blank" href="https://www.instagram.com/shreejal.twayana/" class="logo" id="ig"></a>
      </div>
    </header>
    <div class="main">
      <div class="mainImg"><img src="images/avatar.png" alt="" /></div>
      <div class="description">
        <p class="greet">Hi, I'm <?php echo $words[0];?>,</p>
        <p class="mainDes">I'M A PROFICIENT</p>
        <p class="mainDes" id="skill"></p>

        <p class="devDescription">
          <?php
          require 'conn.php';

          $sql = "SELECT description FROM user";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
            echo $row['description'];
          }

          $conn->close();
          ?>
        </p>
      </div>
    </div>
  </div>

  <div id="project" class="pageSegments">
    <a id="navPre" href="#home"><img src="images/upArrow.png" alt="" /></a>
    <a id="navNext" href="#about"><img src="images/downArrow.png" alt="" /></a>
    <p class="title">Projects</p>

    <div class="cards">
      <?php
          require 'conn.php';

          $sql = "SELECT * FROM projects";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
            ?>
            <div class="Pcard">
              <div class="projectPreview">
                <img src="<?php echo $row['img_path']; ?>" alt="" />
              </div>
              <p class="cardTitle"><?php echo strtoupper($row['title']); ?></p>
              <p class="cardDes">
                <?php echo $row['description']; ?>
              </p>
            </div>
            <?php
            }
    
            $conn->close();
            ?>
            
    </div>
    <div class="cardBtn">
      <button id="pre" class="cBtn">
        <img src="images/upArrow.png" alt="" srcset="" />
      </button>
      <button id="nxt" class="cBtn">
        <img src="images/upArrow.png" alt="" />
      </button>
    </div>
  </div>
  <div id="about" class="pageSegments">
    <a id="navPre" href="#project"><img src="images/upArrow.png" alt="" /></a>
    <a id="navNext" href="#contact"><img src="images/downArrow.png" alt="" /></a>
    <p class="title">About Me</p>
    <p class="moreDes">
      I'm a passionate web developer with a strong foundation in HTML, CSS,
      JavaScript, PHP, and MySQL. I enjoy building responsive, user-friendly
      websites and dynamic web applications that deliver smooth user
      experiences. My experience includes developing CRUD applications,
      working with Fetch API and AJAX, and integrating front-end interfaces
      with back-end functionality. I use Git and GitHub for version control
      and continuously explore new technologies to improve my skills. I'm
      always eager to take on new challenges and grow as a full-stack web
      developer.
    </p>
    <br />
    <br />
    <div class="skillsDes">
      <div class="segments">
        <p class="segTitle" style="color: #38bdf8">FRONTEND</p>
        <p class="segDes">
          I build responsive and user-friendly interfaces using HTML, CSS, and
          JavaScript, focusing on clean design and smooth user experiences.
        </p>

        <div class="segImg">
          <img src="images/html5.png" alt="" />
          <img src="images/css3.png" alt="" />
          <img src="images/js.png" alt="" />
        </div>
      </div>
      <div class="segments">
        <p class="segTitle" style="color: #a855f7">BACKEND</p>
        <p class="segDes">
          I develop server-side applications with PHP, creating dynamic
          features and connecting front-end interfaces with back-end
          functionality.
        </p>

        <div class="segImg">
          <img src="images/php.png" alt="" />
        </div>
      </div>
      <div class="segments">
        <p class="segTitle" style="color: #22c55e">DATABASE</p>
        <p class="segDes">
          I use MySQL to design and manage databases, perform CRUD operations,
          and ensure efficient data storage and retrieval
        </p>
        <div class="segImg">
          <img src="images/mysql.png" alt="" />
        </div>
      </div>
    </div>
  </div>
  <div id="contact" class="pageSegments">
    <a id="navPre" href="#about"><img src="images/upArrow.png" alt="" /></a>
    <p class="title">
      GET <span class="title" style="color: #60a5fa">IN TOUCH</span>
    </p>
    <p class="subDes">
      Have an idea or project? Feel free to send me a message.
    </p>
    <form id="contact-form" action="https://api.w3forms.com/submit" method="POST">
      <input value="w3f_5dca78e3c61daa1e5deb757de67039f5032715afdb4c95d0" type="hidden" name="access_key" />
      <label for="name">Name</label>
      <input type="text" name="name" id="name" required placeholder="Your Name" />
      <label for="message">Message</label>
      <textarea name="message" id="message" placeholder="Message Here..." required></textarea>
      <!-- Honeypot: invisible to people, tempting to bots. Leave empty. -->
      <input type="text" name="_gotcha" tabindex="-1" autocomplete="off" aria-hidden="true"
        style="position: absolute; left: -9999px" />
      <button type="submit">Send</button>
      <p id="status" role="status" aria-live="polite"></p>
    </form>
  </div>
  <script src="script.js"></script>
</body>

</html>