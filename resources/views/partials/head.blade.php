<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JSDEV.nl | @yield('title')</title>
    <style>
        html body {
            margin: 0;
            padding: 0;
            color: white;
            background-color: teal;
            font-family: Helvetica, Verdana, Arial, sans-serif;
        }

        nav {
            display: flex;
            background-color: cadetblue;
            padding: 1rem;
        }

        nav a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 3rem;
            background-color: darkslategrey;
            padding-left: 2rem;
            padding-right: 2rem;
            padding-top: 1rem;
            margin: auto;
            padding-bottom: 1rem;
            color: aliceblue;
            text-decoration: none;
            box-shadow: aliceblue;
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: center;
            height: 80vh;
        }

        h1 {
            font-family: "Trebuchet MS", Tahoma, sans-serif;
        }

    </style>
</head>
