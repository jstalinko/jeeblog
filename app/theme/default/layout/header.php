<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=config('name');?></title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <style>
        nav {
            text-align: center;
            width:600px;
            margin: 0 auto;
        }
        nav ul {
            display: inline-flex;
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            margin: 0 1rem;
        }
        .news-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        .news-article {
            border: 1px solid #eaeaea;
            padding: 1rem;
            border-radius: 8px;
        }
        .news-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#news">News</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About</a></li>
        </ul>
    </nav>

    <!-- Header -->
    <header class="container">
        <h1><?=config('name');?></h1>
        <p><?=config('description');?></p>
    </header>
