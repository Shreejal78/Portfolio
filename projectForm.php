<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio Project Form</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      gap: 40px;
      justify-content: center;
      align-items: center;
      background:
        radial-gradient(circle at top left, #3058ff33, transparent 35%),
        radial-gradient(circle at bottom right, #00d4ff22, transparent 35%),
        linear-gradient(135deg, #0f172a, #111827, #0b1120);
      padding: 30px;
    }

    .container,
    .display {
      width: 100%;
      max-width: 500px;
      max-height: 40em;
      overflow-y: auto;
      border-radius: 22px;
      scrollbar-width: none;
      -ms-overflow-style: none;
    }

    .container::-webkit-scrollbar {
      display: none;
    }

    form,
    .display {
      background: rgba(255, 255, 255, 0.06);
      backdrop-filter: blur(18px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 22px;
      padding: 35px;
      width: 500px;
      box-shadow:
        0 20px 60px rgba(0, 0, 0, 0.45),
        0 0 30px rgba(0, 140, 255, 0.08);
    }

    .title {
      margin-top: 18px;
      text-align: center;
      font-size: 30px;
      font-weight: 700;
      color: #fff;
    }

    .subtitle {
      text-align: center;
      color: #9ca3af;
      margin-top: 8px;
      margin-bottom: 30px;
      font-size: 14px;
    }

    .group {
      margin-bottom: 22px;
    }

    label {
      display: block;
      color: #d1d5db;
      margin-bottom: 8px;
      font-size: 14px;
      font-weight: 500;
    }

    input,
    textarea {
      width: 100%;
      border: none;
      outline: none;
      background: #1f2937;
      color: #fff;
      padding: 15px 18px;
      border-radius: 14px;
      border: 1px solid transparent;
      transition: 0.3s;
      font-size: 15px;
    }

    textarea {
      resize: vertical;
      min-height: 140px;
    }

    input::placeholder,
    textarea::placeholder {
      color: #6b7280;
    }

    input:focus,
    textarea:focus {
      border-color: #38bdf8;
      box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.18);
    }

    #done,
    #updateProject {
      width: 100%;
      border: none;
      cursor: pointer;
      padding: 15px;
      border-radius: 14px;
      font-size: 16px;
      font-weight: 600;
      color: #fff;
      transition: 0.3s;
    }

    #done {
      background: linear-gradient(135deg, #4f46e5, #06b6d4);
    }

    #updateProject {
      background: linear-gradient(135deg, #f59e0b, #f97316);
    }

    #done:hover,
    #updateProject:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(6, 182, 212, 0.35);
    }

    #done:active,
    #updateProject:active {
      transform: scale(0.98);
    }

    @media (max-width: 600px) {
      form {
        padding: 28px;
      }

      .title {
        font-size: 26px;
      }
    }

    .display .title {
      margin: 20px 0 40px 0;
    }

    .project {
      width: 100%;
      margin-bottom: 10px;
      background: linear-gradient(135deg,
          #263f68,
          #1f2937,
          #1a2e48);
      border: 2px solid transparent;
      border-radius: 14px;
      padding: 15px 18px;
      color: white;
      position: relative;
      font-size: 15px;
      user-select: none;
      -moz-user-select: none;
    }

    .project:hover {
      cursor: pointer;
    }

    .porjectDes {
      width: 50%;
      overflow-wrap: break-word;
    }

    .projectTitle {
      text-transform: uppercase;
      font-weight: 700;
    }

    .edit {
      position: absolute;
      top: 5px;
      right: 5px;
    }

    .edit button {
      background-color: #ff0505c7;
      font-size: 24px;
      line-height: 24px;
      color: white;
      border: none;
      text-align: center;
      font-weight: 700;
      padding: 0 5px;
      border-radius: 40%;
    }

    button:hover {
      cursor: pointer;
    }

    .editPopUp {
      height: 100vh;
      width: 100%;
      background-color: #000000a0;
      position: absolute;
      z-index: 5;
      display: none;
      justify-content: center;
      align-items: center;
      backdrop-filter: blur(10px);
    }

    .editForm {
      max-height: 85%;
      overflow-y: scroll;
      background: #111827;
    }

    .editForm::-webkit-scrollbar {
      display: none;
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
          #d8b4fe,
          #a78bfa,
          #8b5cf6,
          #ec4899);

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
  </style>
</head>

<body>
  <a href="index.php" class="homePage topUrl">Home</a>
  <a href="form.php" class="nxtForm topUrl">Switch Form</a>
  <div class="editPopUp">
    <form action="editProject.php" method="POST" class="editForm">

      <h1 class="title">Edit Project</h1>

      <p class="subtitle">Edit your portfolio</p>
      <input type="hidden" name="e_id" id="e_id">
      <div class="group">
        <label for="editTitle">Project Title</label>
        <input id="editTitle" type="text" name="e_title" placeholder="Edit project title" required />
      </div>

      <div class="group">
        <label for="editImg">Project Image Path</label>
        <input id="editImg" type="text" name="e_image" placeholder="Edi Image Path" required />
      </div>

      <div class="group">
        <label for="editGitLink">GitHub Link</label>
        <input type="url" id="editGitLink" name="e_git_url" placeholder="Edit GitHub Link..." required />
      </div>

      <div class="group">
        <label for="editLiveLink">Live Link</label>
        <input type="url" id="editLiveLink" name="e_live_url" placeholder="Edit Hosted Web Link..." required />
      </div>

      <div class="group">
        <label for="editDes">Project Description</label>
        <textarea id="editDes" maxlength="120" name="e_des" placeholder="Edit description Here..." required></textarea>
      </div>

      <button type="submit" id="updateProject">🔄 Update Project</button>
    </form>
  </div>
  <div class="display">
    <h1 class="title">Project Lists</h1>

    <?php
    require 'conn.php';

    $sql = "SELECT * FROM projects";
    $result = $conn->query($sql);
    $words;
    while ($row = $result->fetch_assoc()) {
      ?>

      <div class="project" data-id="<?php echo $row['id']; ?>">
        <input type="hidden" class="projectImg" value="<?php echo $row['img_path']; ?>">
        <input type="hidden" class="project_git_url" value="<?php echo $row['github']; ?>">
        <input type="hidden" class="project_live_url" value="<?php echo $row['live']; ?>">
        <p class="projectTitle"><?php echo $row['title']; ?></p>
        <p class="projectDes"><?php echo $row['description']; ?></p>
        <div class="edit">
          <button class="del" title="Delete Project">×</button>
        </div>
      </div>

      <?php
    }
    $conn->close();
    ?>
  </div>
  <div class="container">
    <form action="insertProject.php" method="POST" id="insForm">

      <h1 class="title">Project Form</h1>

      <p class="subtitle">Add a new project to your portfolio</p>

      <div class="group">
        <label for="title">Project Title</label>
        <input type="text" id="title" name="title" placeholder="Enter project title" required />
      </div>

      <div class="group">
        <label for="image">Project Image Path</label>
        <input type="text" id="image" name="image" placeholder="Image Path" value="images/projectImages/" required />
      </div>

      <div class="group">
        <label for="gitLink">GitHub Link</label>
        <input type="url" id="gitLink" name="git_url" placeholder="Enter GitHub Link..." required />
      </div>

      <div class="group">
        <label for="liveLink">Live Link</label>
        <input type="url" id="liveLink" name="live_url" placeholder="Enter Hosted Web Link..." required />
      </div>

      <div class="group">
        <label for="des">Project Description</label>
        <textarea id="des" maxlength="120" name="des" placeholder="Write a short description about the project..."
          required></textarea>
      </div>

      <button type="submit" id="done">🚀 Add Project</button>
    </form>
  </div>

  <script>
    const insForm = document.querySelector("#insForm");
    let popUp = document.querySelector('.editPopUp')
    document.querySelectorAll('.del').forEach(btn => {
      btn.addEventListener('click', (e) => {
        let id = e.target.parentElement.parentElement.dataset.id;
        fetch(`delete.php?id=${id}`).then(res => res.text()).then(data => {
          if (data === 'success') {
            e.target.parentElement.parentElement.remove();
            console.log('remove Success!!')
          } else {
            console.log(`[${data}]`)
          }
        })
      })
    })

    document.querySelectorAll('.project').forEach(project => {
      project.addEventListener('dblclick', () => {
        popUp.style.display = 'flex'
        document.getElementById('e_id').value = project.dataset.id;
        document.getElementById('editTitle').value = project.querySelector('.projectTitle').innerText;
        document.getElementById('editImg').value = project.querySelector('.projectImg').value;
        document.getElementById('editGitLink').value = project.querySelector('.project_git_url').value;
        document.getElementById('editLiveLink').value = project.querySelector('.project_live_url').value;
        document.getElementById('editDes').value = project.querySelector('.projectDes').innerText;
      })
    })
    popUp.addEventListener('click', (e) => {
      if (e.target.classList[0] == 'editPopUp') {
        popUp.style.display = 'none';
      }
    })
  </script>
</body>

</html>