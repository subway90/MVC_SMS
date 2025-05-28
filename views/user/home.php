<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Lex - Học Từ Vựng Thông Minh</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <style>
      :root {
        --primary-color: #60a5fa;
        --secondary-color: #2563eb;
        --background: #f0f4f8;
        --card-bg: #ffffff;
        --text-primary: #1e293b;
        --text-secondary: #64748b;
        --shadow: 0 6px 25px rgba(0, 0, 0, 0.06);
        --sidebar-width: 250px;
        --sidebar-collapsed-width: 60px;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        -webkit-tap-highlight-color: transparent;
        font-family: "Poppins", sans-serif;
      }

      body {
        background: var(--background);
        color: var(--text-primary);
        line-height: 1.6;
        overflow-x: hidden;
        position: relative;
      }

      @media (min-width: 769px) {
        body {
          padding-left: var(--sidebar-collapsed-width);
        }
      }

      .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        z-index: 999;
        transition: opacity 0.3s ease;
      }

      .sidebar.expanded ~ .overlay {
        display: block;
        opacity: 1;
      }

      .mobile-header {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 60px;
        background: var(--card-bg);
        box-shadow: var(--shadow);
        z-index: 1200;
        padding: 0 1rem;
        align-items: center;
        justify-content: space-between;
      }

      .mobile-header .logo {
        display: flex;
        align-items: center;
        gap: 0.8rem;
      }

      .mobile-header .logo img {
        width: 32px;
        flex-shrink: 0;
      }

      .mobile-header .logo-text {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary-color);
      }

      .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: var(--sidebar-collapsed-width);
        height: 100vh;
        background: var(--card-bg);
        box-shadow: var(--shadow);
        transition: all 0.3s ease;
        will-change: width, transform;
        z-index: 1000;
        padding: 1rem 0;
        display: flex;
        flex-direction: column;
      }

      .sidebar.expanded {
        width: var(--sidebar-width);
        z-index: 1001;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      }

      @media (min-width: 769px) {
        .sidebar:hover {
          width: var(--sidebar-width);
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
      }

      .sidebar .logo {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.8rem;
        margin-bottom: 1rem;
        min-height: 50px;
        position: relative;
      }

      .sidebar .logo img {
        width: 32px;
        flex-shrink: 0;
      }

      .sidebar .logo-text {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary-color);
        opacity: 0;
        transform: translateX(-10px);
        transition: opacity 0.3s ease 0.1s, transform 0.3s ease 0.1s;
        white-space: nowrap;
      }

      .sidebar.expanded .logo-text,
      .sidebar:hover .logo-text {
        opacity: 1;
        transform: translateX(0);
      }

      .toggle-btn {
        display: none;
        width: 40px;
        height: 40px;
        background: var(--primary-color);
        border: none;
        border-radius: 50%;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
      }

      .toggle-btn i {
        color: var(--card-bg);
        font-size: 1.2rem;
      }

      .sidebar.expanded .toggle-btn {
        transform: rotate(90deg);
      }

      @media (max-width: 768px) {
        .mobile-header {
          display: flex;
        }
        .toggle-btn {
          display: flex;
        }
        body {
          padding-left: 0;
          padding-top: 60px;
        }
        .sidebar {
          left: calc(var(--sidebar-width) * -1);
          width: var(--sidebar-width);
          transition: left 0.3s ease;
          top: 60px;
          height: calc(100vh - 60px);
        }
        .sidebar.expanded {
          left: 0;
        }
        .sidebar .logo {
          display: none;
        }
        .overlay {
          display: none;
        }
      }

      .sidebar-menu {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
      }

      .sidebar-menu a,
      .sidebar-menu .sidebar-cta {
        text-decoration: none;
        color: var(--text-primary);
        font-weight: 400;
        font-size: 0.95rem;
        padding: 0.7rem 0.8rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        border-radius: 8px;
        transition: background 0.3s, color 0.3s;
        margin: 0 0.4rem;
        white-space: nowrap;
      }

      .sidebar-menu a i,
      .sidebar-menu .sidebar-cta i {
        font-size: 1.1rem;
        color: var(--primary-color);
        width: 20px;
        text-align: center;
        flex-shrink: 0;
      }

      .sidebar-menu a:hover,
      .sidebar-menu .sidebar-cta:hover {
        background: var(--primary-color);
        color: var(--card-bg);
      }

      .sidebar-menu a:hover i,
      .sidebar-menu .sidebar-cta:hover i {
        color: var(--card-bg);
      }

      .sidebar:not(.expanded) .sidebar-menu a span,
      .sidebar:not(.expanded) .sidebar-cta span {
        opacity: 0;
        visibility: hidden;
        transform: translateX(-10px);
        transition: opacity 0.3s ease 0.1s, transform 0.3s ease 0.1s;
      }

      .sidebar.expanded .sidebar-menu a span,
      .sidebar.expanded .sidebar-cta span,
      .sidebar:hover .sidebar-menu a span,
      .sidebar:hover .sidebar-cta span {
        opacity: 1;
        visibility: visible;
        transform: translateX(0);
      }

      .sidebar-cta {
        background: var(--primary-color);
        color: var(--card-bg);
        font-weight: 600;
        cursor: pointer;
      }

      .user-info {
        display: none;
        flex-direction: column;
        gap: 0.5rem;
        padding: 0.8rem;
        border-top: 1px solid #e2e8f0;
      }

      .user-info img {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        flex-shrink: 0;
        cursor: pointer;
      }

      .user-info span {
        font-size: 0.9rem;
        font-weight: 600;
        white-space: nowrap;
      }

      .logout-btn {
        background: var(--secondary-color);
        color: var(--card-bg);
        padding: 0.5rem 0.8rem;
        border-radius: 8px;
        cursor: pointer;
        text-align: center;
        font-size: 0.9rem;
      }

      .logout-btn:hover {
        background: #1e40af;
      }

      .user-progress {
        font-size: 0.8rem;
        color: var(--text-secondary);
        white-space: nowrap;
      }

      .custom-data-section {
        margin-top: 0.8rem;
        opacity: 0;
        visibility: hidden;
        transform: translateX(-10px);
        transition: opacity 0.3s ease 0.1s, transform 0.3s ease 0.1s;
      }

      .sidebar.expanded .custom-data-section,
      .sidebar:hover .custom-data-section {
        opacity: 1;
        visibility: visible;
        transform: translateX(0);
      }

      .custom-data-section input {
        padding: 0.4rem;
        border: 1px solid var(--primary-color);
        border-radius: 5px;
        width: 100%;
        margin-bottom: 0.4rem;
        font-size: 0.9rem;
      }

      .custom-data-section button {
        padding: 0.4rem 0.8rem;
        background: var(--primary-color);
        color: var(--card-bg);
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 0.9rem;
      }

      .custom-data-section button:hover {
        background: var(--secondary-color);
      }

      .custom-data-section ul {
        list-style: none;
        margin-top: 0.4rem;
      }

      .custom-data-section li {
        padding: 0.4rem;
        background: var(--card-bg);
        border-radius: 5px;
        margin-bottom: 0.4rem;
        box-shadow: var(--shadow);
        font-size: 0.85rem;
        white-space: nowrap;
      }

      .hero {
        max-width: 1400px;
        margin: 3rem auto;
        padding: 0 1rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        align-items: center;
      }

      .hero-text h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 1rem;
      }

      .hero-text p {
        font-size: 1.1rem;
        color: var(--text-secondary);
        margin-bottom: 1.5rem;
        max-width: 500px;
      }

      .hero-buttons {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
      }

      .btn {
        padding: 0.7rem 2rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        font-size: 0.95rem;
      }

      .btn-primary {
        background: var(--primary-color);
        color: var(--card-bg);
      }

      .btn-primary:hover {
        background: var(--secondary-color);
      }

      .btn-secondary {
        background: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
      }

      .btn-secondary:hover {
        background: var(--primary-color);
        color: var(--card-bg);
      }

      .hero-image img {
        width: 100%;
        border-radius: 15px;
        box-shadow: var(--shadow);
      }

      .vocab-trial {
        background: var(--card-bg);
        padding: 1rem;
        border-radius: 10px;
        box-shadow: var(--shadow);
        max-width: 400px;
      }

      .vocab-trial h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.8rem;
      }

      .vocab-trial input {
        width: 65%;
        padding: 0.6rem;
        border: 1px solid var(--primary-color);
        border-radius: 8px 0 0 8px;
        font-size: 0.9rem;
        outline: none;
      }

      .vocab-trial button {
        padding: 0.6rem 1rem;
        border: none;
        background: var(--primary-color);
        color: var(--card-bg);
        border-radius: 0 8px 8px 0;
        cursor: pointer;
        font-weight: 600;
        transition: background 0.3s;
        font-size: 0.9rem;
      }

      .vocab-trial button:hover {
        background: var(--secondary-color);
      }

      .section {
        max-width: 1400px;
        margin: 4rem auto;
        padding: 0 1rem;
      }

      .section h2 {
        font-size: 2.2rem;
        font-weight: 600;
        color: var(--text-primary);
        text-align: center;
        margin-bottom: 1rem;
      }

      .section p.subtitle {
        font-size: 1rem;
        color: var(--text-secondary);
        text-align: center;
        margin-bottom: 2rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
      }

      .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
      }

      .feature-card {
        background: var(--card-bg);
        padding: 1.5rem;
        border-radius: 15px;
        box-shadow: var(--shadow);
        text-align: center;
      }

      .feature-card i {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
      }

      .feature-card h3 {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 0.8rem;
      }

      .feature-card p {
        font-size: 0.95rem;
        color: var(--text-secondary);
      }

      .roadmap-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        justify-content: center;
      }

      .roadmap-item {
        flex: 1 1 300px;
        background: var(--card-bg);
        padding: 1.5rem;
        border-radius: 15px;
        box-shadow: var(--shadow);
        position: relative;
      }

      .roadmap-item::before {
        content: "";
        position: absolute;
        top: 20px;
        left: -12px;
        width: 20px;
        height: 20px;
        background: var(--primary-color);
        border-radius: 50%;
      }

      .roadmap-item h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.6rem;
      }

      .progress-demo {
        background: var(--card-bg);
        padding: 2rem;
        border-radius: 15px;
        box-shadow: var(--shadow);
        text-align: center;
      }

      .progress-demo img {
        max-width: 100%;
        border-radius: 8px;
        margin-top: 1.5rem;
      }

      .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
      }

      .testimonial-card {
        background: var(--card-bg);
        padding: 1.5rem;
        border-radius: 15px;
        box-shadow: var(--shadow);
      }

      .testimonial-card p {
        font-style: italic;
        color: var(--text-secondary);
        margin-bottom: 0.8rem;
        font-size: 0.95rem;
      }

      .testimonial-card h4 {
        font-size: 1rem;
        font-weight: 600;
        color: var(--primary-color);
      }

      .cta-section {
        background: var(--primary-color);
        color: var(--card-bg);
        text-align: center;
        padding: 3rem 1rem;
        border-radius: 15px;
        margin: 4rem 1rem;
      }

      .cta-section h2 {
        color: var(--card-bg);
        font-size: 2rem;
      }

      .cta-section p {
        color: var(--card-bg);
        font-size: 1rem;
        margin-bottom: 1.5rem;
      }

      .cta-section .btn {
        background: var(--card-bg);
        color: var(--primary-color);
        padding: 0.8rem 2.5rem;
      }

      .cta-section .btn:hover {
        background: #f0f0f0;
      }

      .footer {
        background: var(--card-bg);
        padding: 3rem 1rem;
        border-top: 1px solid #e2e8f0;
      }

      .footer-container {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
      }

      .footer h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.8rem;
      }

      .footer ul {
        list-style: none;
      }

      .footer ul li {
        margin-bottom: 0.6rem;
      }

      .footer ul a {
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 0.95rem;
        transition: color 0.3s;
      }

      .footer ul a:hover {
        color: var(--primary-color);
      }

      .footer .social-links a {
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }

      .footer .social-links i {
        font-size: 1.1rem;
      }

      .footer .copyright {
        text-align: center;
        margin-top: 2rem;
        color: var(--text-secondary);
        font-size: 0.9rem;
      }

      .header-controls {
        display: flex;
        align-items: center;
        gap: 1rem;
      }

      .header-user-btn {
        background: none;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        padding: 0.5rem;
        border-radius: 50%;
        transition: background-color 0.3s ease;
      }

      .header-user-btn:hover {
        background-color: rgba(0, 0, 0, 0.05);
      }

      .header-user-btn img {
        width: 32px;
        height: 32px;
        border-radius: 50%;
      }

      .user-dropdown {
        position: fixed;
        top: 60px;
        left: calc(var(--sidebar-collapsed-width) + 10px);
        background: var(--card-bg);
        border-radius: 10px;
        box-shadow: var(--shadow);
        width: 280px;
        z-index: 1002;
        display: none;
        animation: slideDown 0.3s ease;
      }

      .sidebar.expanded ~ .user-dropdown {
        left: calc(var(--sidebar-width) + 10px);
      }

      @keyframes slideDown {
        from {
          opacity: 0;
          transform: translateY(-10px) translateX(-10px);
        }
        to {
          opacity: 1;
          transform: translateY(0) translateX(0);
        }
      }

      .user-dropdown.active {
        display: block;
      }

      @media (max-width: 768px) {
        .user-dropdown {
          left: 10px;
          right: 10px;
          width: auto;
          top: 70px;
        }
        .sidebar.expanded ~ .user-dropdown {
          left: 10px;
          right: 10px;
        }
      }

      .user-dropdown-header {
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        gap: 1rem;
      }

      .user-dropdown-header img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
      }

      .user-dropdown-header-info h4 {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0;
      }

      .user-dropdown-header-info p {
        font-size: 0.9rem;
        color: var(--text-secondary);
        margin: 0.2rem 0 0 0;
      }

      .user-dropdown-menu {
        padding: 0.5rem;
      }

      .user-dropdown-item {
        padding: 0.8rem 1rem;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        color: var(--text-primary);
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        cursor: pointer;
      }

      .user-dropdown-item:hover {
        background-color: #f8fafc;
      }

      .user-dropdown-item i {
        font-size: 1.1rem;
        color: var(--primary-color);
        width: 20px;
        text-align: center;
      }

      @media (max-width: 768px) {
        .hero {
          grid-template-columns: 1fr;
          text-align: center;
          margin: 2rem auto;
          gap: 1.5rem;
        }

        .hero-text h1 {
          font-size: 1.8rem;
        }

        .hero-text p {
          font-size: 1rem;
          max-width: 100%;
        }

        .hero-buttons {
          justify-content: center;
          flex-wrap: wrap;
        }

        .btn {
          padding: 0.6rem 1.5rem;
          font-size: 0.9rem;
        }

        .vocab-trial {
          max-width: 100%;
          padding: 0.8rem;
        }

        .vocab-trial input {
          width: 60%;
          padding: 0.5rem;
        }

        .vocab-trial button {
          padding: 0.5rem 0.8rem;
        }

        .section {
          margin: 3rem auto;
        }

        .section h2 {
          font-size: 1.8rem;
        }

        .section p.subtitle {
          font-size: 0.9rem;
        }

        .features-grid,
        .testimonials-grid {
          grid-template-columns: 1fr;
        }

        .feature-card,
        .roadmap-item,
        .testimonial-card {
          padding: 1.2rem;
        }

        .roadmap-item::before {
          top: 15px;
          left: -10px;
          width: 15px;
          height: 15px;
        }

        .cta-section {
          margin: 3rem 0.5rem;
          padding: 2rem 0.5rem;
        }

        .cta-section h2 {
          font-size: 1.6rem;
        }

        .cta-section p {
          font-size: 0.9rem;
        }

        .footer {
          padding: 2rem 0.5rem;
        }

        .footer-container {
          grid-template-columns: 1fr;
          gap: 1.5rem;
        }
      }

      @media (max-width: 480px) {
        .hero-text h1 {
          font-size: 1.5rem;
        }

        .btn {
          padding: 0.5rem 1.2rem;
          font-size: 0.85rem;
        }

        .vocab-trial input {
          width: 55%;
        }
      }
    </style>
  </head>
  <body>
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Mobile Header -->
    <div class="mobile-header">
      <div class="logo">
        <img src="<?= URL_STORAGE ?>system/Remove-bg.ai_1734260849847.png" alt="Smart Lex Logo" />
        <span class="logo-text">Smart Lex</span>
      </div>
      <div class="header-controls">
        <button class="header-user-btn" id="headerUserBtn">
          <img
            id="headerUserAvatar"
            src="https://placehold.co/32x32"
            alt="User Avatar"
          />
        </button>
        <div class="toggle-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </div>
    <!-- User Dropdown -->
    <div class="user-dropdown" id="userDropdown">
      <div class="user-dropdown-header">
        <img
          id="dropdownUserAvatar"
          src="https://placehold.co/40x40"
          alt="User Avatar"
        />
        <div class="user-dropdown-header-info">
          <h4 id="dropdownUserName">Tên người dùng</h4>
          <p id="dropdownUserEmail">email@example.com</p>
        </div>
      </div>
      <div class="user-dropdown-menu">
        <a
          href="https://facebook.com"
          target="_blank"
          class="user-dropdown-item"
        >
          <i class="fas fa-question-circle"></i>
          <span>Trợ giúp</span>
        </a>
        <div class="user-dropdown-item" id="dropdownLogoutButton">
          <i class="fas fa-sign-out-alt"></i>
          <span>Đăng xuất</span>
        </div>
      </div>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="logo">
        <img src="<?= URL_STORAGE ?>system/Remove-bg.ai_1734260849847.png" alt="Smart Lex Logo" />
        <span class="logo-text">Smart Lex</span>
      </div>
      <nav class="sidebar-menu">
        <a href="./main/vocabulary.html"
          ><i class="fas fa-cogs"></i><span>tạo kho từ vựng </span></a
        >
        <a href="./tuhoc.html"
          ><i class="fas fa-road"></i><span>Lộ trình học có sẵn</span></a
        >
        <a href="#progress"
          ><i class="fas fa-chart-bar"></i><span>Tiến Độ</span></a
        >
        <a href="#testimonials"
          ><i class="fas fa-comments"></i><span>Đánh Giá</span></a
        >
        <div class="sidebar-cta" id="signUpButton">
          <i class="fas fa-user-plus"></i><span>Đăng Ký</span>
        </div>
        <div class="sidebar-cta" id="signInButton">
          <i class="fas fa-sign-in-alt"></i><span>Đăng Nhập</span>
        </div>
        <div class="user-info" id="userInfo">
          <img id="userAvatar" src="" alt="User Avatar" />
          <span id="userName"></span>
          <div class="user-progress" id="userProgress"></div>
          <div class="custom-data-section">
            <input
              type="text"
              id="customInput"
              placeholder="Nhập thông tin..."
            />
            <button id="addCustomButton">Thêm</button>
            <ul id="customDataList"></ul>
          </div>
        </div>
      </nav>
    </div>

    <!-- Main Content -->
    <main>
      <section class="hero">
        <div class="hero-text">
          <h1>
            Khám Phá Thế Giới Từ Vựng<br />với
            <span style="color: var(--primary-color)">Smart Lex</span>
          </h1>
          <p>
            Biến từ vựng thành sức mạnh của bạn với công nghệ AI tiên tiến, trò
            chơi học tập sáng tạo, và lộ trình được thiết kế riêng.
          </p>
          <div class="hero-buttons">
            <a href="#" class="btn btn-primary">Dùng Thử Ngay</a>
            <a href="#features" class="btn btn-secondary">Xem Tính Năng</a>
          </div>
        </div>
        <div class="hero-image">
          <img src="https://placehold.co/600x400" alt="Khám Phá Smart Lex" />
        </div>
      </section>

      <section class="section" id="features">
        <h2>Tính Năng Nổi Bật</h2>
        <p class="subtitle">
          Công cụ hiện đại giúp bạn học từ vựng nhanh chóng và hiệu quả.
        </p>
        <div class="features-grid">
          <div class="feature-card">
            <i class="fas fa-brain"></i>
            <h3>AI Cá Nhân Hóa</h3>
            <p>Gợi ý từ vựng phù hợp với trình độ và thói quen học.</p>
          </div>
          <div class="feature-card">
            <i class="fas fa-book"></i>
            <h3>20.000+ Từ Vựng</h3>
            <p>Kho từ vựng từ A1 đến C2, đa dạng chủ đề.</p>
          </div>
          <div class="feature-card">
            <i class="fas fa-gamepad"></i>
            <h3>Trò Chơi Học Tập</h3>
            <p>Ghi nhớ từ vựng qua mini-game thú vị.</p>
          </div>
          <div class="feature-card">
            <i class="fas fa-microphone"></i>
            <h3>Luyện Phát Âm</h3>
            <p>Phát âm chuẩn với nhận diện giọng nói.</p>
          </div>
          <div class="feature-card">
            <i class="fas fa-mobile-alt"></i>
            <h3>Ứng Dụng Di Động</h3>
            <p>Học mọi lúc, mọi nơi với đồng bộ tức thì.</p>
          </div>
          <div class="feature-card">
            <i class="fas fa-sync"></i>
            <h3>Spaced Repetition</h3>
            <p>Ghi nhớ lâu dài với lặp lại ngắt quãng.</p>
          </div>
        </div>
      </section>

      <section class="section" id="roadmap">
        <h2>Lộ Trình Học Tập</h2>
        <p class="subtitle">Từ zero đến hero với lộ trình khoa học.</p>
        <div class="roadmap-grid">
          <div class="roadmap-item">
            <h3>1. Khởi Động (A1-A2)</h3>
            <p>Học 300 từ cơ bản qua flashcard và nghe.</p>
          </div>
          <div class="roadmap-item">
            <h3>2. Nền Tảng (B1)</h3>
            <p>Mở rộng 1000 từ qua câu chuyện và hội thoại.</p>
          </div>
          <div class="roadmap-item">
            <h3>3. Chuyên Sâu (B2)</h3>
            <p>Học từ vựng IELTS/TOEIC, luyện giao tiếp.</p>
          </div>
          <div class="roadmap-item">
            <h3>4. Thành Thạo (C1-C2)</h3>
            <p>Thành thạo 5000+ từ nâng cao.</p>
          </div>
        </div>
      </section>

      <section class="section" id="progress">
        <h2>Theo Dõi Tiến Độ</h2>
        <p class="subtitle">Xem tiến bộ qua biểu đồ và nhận gợi ý từ AI.</p>
        <div class="progress-demo">
          <p>Theo dõi số từ đã học và mức độ thành thạo.</p>
          <img src="https://placehold.co/800x400" alt="Progress Chart Demo" />
        </div>
      </section>

      <section class="section" id="testimonials">
        <h2>Người Dùng Nói Gì?</h2>
        <p class="subtitle">Hàng nghìn học viên đã cải thiện từ vựng.</p>
        <div class="testimonials-grid">
          <div class="testimonial-card">
            <p>"Học 500 từ trong 2 tuần, rất thú vị!"</p>
            <h4>Nguyễn Minh Anh - Sinh viên</h4>
          </div>
          <div class="testimonial-card">
            <p>"Phát âm cải thiện rõ rệt, đáng dùng!"</p>
            <h4>Trần Hoàng Nam - Nhân viên</h4>
          </div>
          <div class="testimonial-card">
            <p>"Đạt IELTS 7.0 nhờ Smart Lex!"</p>
            <h4>Lê Thị Hồng - Du học sinh</h4>
          </div>
        </div>
      </section>

      <section class="cta-section">
        <h2>Bắt Đầu Hành Trình Từ Vựng!</h2>
        <p>Tham gia miễn phí và học hiệu quả nhất.</p>
        <a href="#" class="btn">Đăng Ký Ngay</a>
      </section>
    </main>

    <footer class="footer">
      <div class="footer-container">
        <div>
          <h3>Smart Lex</h3>
          <ul>
            <li><a href="#!">Giới thiệu</a></li>
            <li><a href="#!">Đội ngũ</a></li>
            <li><a href="#!">Hỗ trợ</a></li>
          </ul>
        </div>
        <div>
          <h3>Danh Mục Học</h3>
          <ul>
            <li><a href="#!">Sáng tạo kho từ của riêng bạn</a></li>
            <li><a href="#!">Học theo lộ trình có sẵn</a></li>
          </ul>
        </div>
        <div>
          <h3>Kết Nối</h3>
          <ul class="social-links">
            <li>
              <a href="#!"><i class="fab fa-twitter"></i> Tiktok</a>
            </li>
            <li>
              <a href="#!"><i class="fab fa-facebook-f"></i> Facebook</a>
            </li>
            <li>
              <a href="#!"><i class="fab fa-instagram"></i> Instagram</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="copyright">© 2025 Smart Lex. All rights reserved.</div>
    </footer>

    <script type="module">
      import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.1/firebase-app.js";
      import {
        getAuth,
        GoogleAuthProvider,
        signInWithPopup,
        signOut,
        onAuthStateChanged,
      } from "https://www.gstatic.com/firebasejs/11.0.1/firebase-auth.js";
      import {
        getFirestore,
        doc,
        setDoc,
        getDoc,
        onSnapshot,
        serverTimestamp,
      } from "https://www.gstatic.com/firebasejs/11.0.1/firebase-firestore.js";

      const firebaseConfig = {
        apiKey: "AIzaSyDr7ySnNfcgB2b2u2tPZLc5L4l1FGdjX4A",
        authDomain: "login-81d5f.firebaseapp.com",
        projectId: "login-81d5f",
        storageBucket: "login-81d5f.firebasestorage.app",
        messagingSenderId: "103989490854",
        appId: "YOUR_ACTUAL_APP_ID",
      };

      const app = initializeApp(firebaseConfig);
      const auth = getAuth(app);
      const db = getFirestore(app);

      const signInButton = document.getElementById("signInButton");
      const signUpButton = document.getElementById("signUpButton");
      const userInfo = document.getElementById("userInfo");
      const userAvatar = document.getElementById("userAvatar");
      const userName = document.getElementById("userName");
      const userProgress = document.getElementById("userProgress");
      const customInput = document.getElementById("customInput");
      const addCustomButton = document.getElementById("addCustomButton");
      const customDataList = document.getElementById("customDataList");
      const sidebar = document.querySelector(".sidebar");
      const toggleBtn = document.querySelector(".toggle-btn");
      const overlay = document.querySelector(".overlay");
      const headerUserBtn = document.getElementById("headerUserBtn");
      const headerUserAvatar = document.getElementById("headerUserAvatar");
      const userDropdown = document.getElementById("userDropdown");
      const dropdownUserAvatar = document.getElementById("dropdownUserAvatar");
      const dropdownUserName = document.getElementById("dropdownUserName");
      const dropdownUserEmail = document.getElementById("dropdownUserEmail");
      const dropdownLogoutButton = document.getElementById(
        "dropdownLogoutButton"
      );

      function displayCustomData(dataList) {
        customDataList.innerHTML = "";
        dataList.forEach((item) => {
          const li = document.createElement("li");
          li.textContent = item;
          customDataList.appendChild(li);
        });
      }

      onAuthStateChanged(auth, async (user) => {
        if (user) {
          signInButton.style.display = "none";
          signUpButton.style.display = "none";
          userInfo.style.display = "flex";
          userAvatar.src = user.photoURL || "https://placehold.co/28x28";
          userName.textContent = user.displayName || "Người dùng";
          headerUserBtn.style.display = "flex";
          headerUserAvatar.src = user.photoURL || "https://placehold.co/32x32";
          dropdownUserAvatar.src =
            user.photoURL || "https://placehold.co/40x40";
          dropdownUserName.textContent = user.displayName || "Người dùng";
          dropdownUserEmail.textContent = user.email || "email@example.com";

          const userRef = doc(db, "users", user.uid);
          const userSnap = await getDoc(userRef);
          if (!userSnap.exists()) {
            await setDoc(userRef, {
              name: user.displayName,
              email: user.email,
              photoURL: user.photoURL,
              lastLogin: serverTimestamp(),
              customData: [],
            });
          } else {
            await setDoc(
              userRef,
              { lastLogin: serverTimestamp() },
              { merge: true }
            );
          }

          listenToUserData(user.uid);
        } else {
          signInButton.style.display = "flex";
          signUpButton.style.display = "flex";
          userInfo.style.display = "none";
          userProgress.textContent = "";
          customDataList.innerHTML = "";
          headerUserBtn.style.display = "none";
          userDropdown.classList.remove("active");
        }
      });

      function signInWithGoogle() {
        const provider = new GoogleAuthProvider();
        signInWithPopup(auth, provider)
          .then((result) => {
            const user = result.user;
            alert(`Đăng nhập thành công! Xin chào ${user.displayName}`);
          })
          .catch((error) => {
            alert("Lỗi đăng nhập: " + error.message);
          });
      }

      function signUpWithGoogle() {
        const provider = new GoogleAuthProvider();
        signInWithPopup(auth, provider)
          .then((result) => {
            const user = result.user;
            alert(`Đăng ký thành công! Xin chào ${user.displayName}`);
          })
          .catch((error) => {
            alert("Lỗi đăng ký: " + error.message);
          });
      }

      signInButton.addEventListener("click", signInWithGoogle);
      signUpButton.addEventListener("click", signUpWithGoogle);

      function logout() {
        signOut(auth)
          .then(() => {
            alert("Đã đăng xuất!");
            userDropdown.classList.remove("active");
          })
          .catch((error) => {
            alert("Lỗi đăng xuất: " + error.message);
          });
      }

      dropdownLogoutButton.addEventListener("click", () => {
        console.log("Logout button clicked");
        logout();
      });

      async function addCustomData(user, newData) {
        try {
          const userRef = doc(db, "users", user.uid);
          const userSnap = await getDoc(userRef);
          let currentData = userSnap.exists()
            ? userSnap.data().customData || []
            : [];
          currentData.push(newData);
          await setDoc(userRef, { customData: currentData }, { merge: true });
          console.log("Dữ liệu đã được thêm!");
        } catch (error) {
          console.error("Lỗi thêm dữ liệu:", error);
        }
      }

      function listenToUserData(userId) {
        const userRef = doc(db, "users", userId);
        onSnapshot(
          userRef,
          (userSnap) => {
            if (userSnap.exists()) {
              const data = userSnap.data();
              userName.textContent = data.name || "Người dùng";
              userAvatar.src = data.photoURL || "https://placehold.co/28x28";
              userProgress.textContent = `Dữ liệu: ${
                data.customData ? data.customData.length : 0
              } mục`;
              displayCustomData(data.customData || []);
            }
          },
          (error) => {
            console.error("Lỗi tải dữ liệu:", error);
            userProgress.textContent = "Lỗi tải dữ liệu.";
          }
        );
      }

      addCustomButton.addEventListener("click", async () => {
        const user = auth.currentUser;
        if (user && customInput.value.trim()) {
          await addCustomData(user, customInput.value.trim());
          customInput.value = "";
        } else {
          alert("Vui lòng đăng nhập và nhập dữ liệu!");
        }
      });

      function updateDropdownPosition() {
        if (window.innerWidth > 768) {
          userDropdown.style.left = sidebar.classList.contains("expanded")
            ? `calc(${getComputedStyle(
                document.documentElement
              ).getPropertyValue("--sidebar-width")} + 10px)`
            : `calc(${getComputedStyle(
                document.documentElement
              ).getPropertyValue("--sidebar-collapsed-width")} + 10px)`;
        }
      }

      if (headerUserBtn && userDropdown) {
        headerUserBtn.addEventListener("click", () => {
          userDropdown.classList.toggle("active");
          updateDropdownPosition();
        });
      } else {
        console.error("headerUserBtn or userDropdown not found");
      }

      if (userAvatar && userDropdown) {
        userAvatar.addEventListener("click", () => {
          userDropdown.classList.toggle("active");
          updateDropdownPosition();
        });
      } else {
        console.error("userAvatar or userDropdown not found");
      }

      document.addEventListener("click", (event) => {
        if (
          !headerUserBtn.contains(event.target) &&
          !userDropdown.contains(event.target) &&
          !userAvatar.contains(event.target)
        ) {
          userDropdown.classList.remove("active");
        }
      });

      if (window.innerWidth > 768) {
        sidebar.addEventListener("mouseenter", () => {
          sidebar.classList.add("expanded");
          updateDropdownPosition();
        });

        sidebar.addEventListener("mouseleave", () => {
          sidebar.classList.remove("expanded");
          updateDropdownPosition();
        });

        overlay.addEventListener("click", () => {
          sidebar.classList.remove("expanded");
          updateDropdownPosition();
        });
      }

      toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("expanded");
        updateDropdownPosition();
      });
    </script>
  </body>
</html>
