<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #1e90ff, #00bfff);
      color: white;
      text-align: center;
    }
    .welcome-container {
      background-color: rgba(0, 0, 0, 0.3);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }
    h1 {
      font-size: 3rem;
      margin-bottom: 20px;
    }
    p {
      font-size: 1.2rem;
      margin-bottom: 30px;
    }
    .login-btn {
      padding: 12px 25px;
      background-color: #ffffff;
      color: #1e90ff;
      font-weight: bold;
      border: none;
      border-radius: 25px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease, color 0.3s ease;
    }
    .login-btn:hover {
      background-color: #1e90ff;
      color: white;
      border: 2px solid white;
    }
  </style>
</head>
<body>
  <div class="welcome-container">
    <h1>Welcome!</h1>
    <p>Selamat datang di website kami. Klik tombol di bawah untuk masuk ke halaman login.</p>
    <button class="login-btn" onclick="window.location.href='login.html'">Login</button>
  </div>
</body>
</html>
