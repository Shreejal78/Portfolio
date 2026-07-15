<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio Project Form</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

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
        justify-content: center;
        align-items: center;
        background:
          radial-gradient(circle at top left, #3058ff33, transparent 35%),
          radial-gradient(circle at bottom right, #00d4ff22, transparent 35%),
          linear-gradient(135deg, #0f172a, #111827, #0b1120);
        padding: 30px;
      }

      .container {
        width: 100%;
        max-width: 500px;
      }

      form {
        background: rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 22px;
        padding: 35px;
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

      button {
        width: 100%;
        border: none;
        cursor: pointer;
        padding: 15px;
        border-radius: 14px;
        font-size: 16px;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(135deg, #4f46e5, #06b6d4);
        transition: 0.3s;
      }

      button:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(6, 182, 212, 0.35);
      }

      button:active {
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
    </style>
  </head>
  <body>
    <div class="container">
      <form action="insertProject.php" method="POST">

        <h1 class="title">Project Form</h1>

        <p class="subtitle">Add a new project to your portfolio</p>

        <div class="group">
          <label for="title">Project Title</label>
          <input
            type="text"
            id="title"
            name="title"
            placeholder="Enter project title"
            required
          />
        </div>

        <div class="group">
          <label for="image">Project Image Path</label>
          <input
            type="text"
            id="image"
            name="image"
            placeholder="Image Path"
            required
          />
        </div>

        <div class="group">
          <label for="des">Project Description</label>
          <textarea
            id="des"
            name="des"
            placeholder="Write a short description about the project..."
            required
          ></textarea>
        </div>

        <button type="submit">🚀 Add Project</button>
      </form>
    </div>
  </body>
</html>
