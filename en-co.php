<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .chat{
            width: 100%;
            max-width: 400px;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h2{
            text-align: center;
            color: #333;
        }
        .chat-box{
            height: 300px;
            overflow-y: auto;
            padding: 10px;
            border: 1p solid #ddd;
            margin-bottom: 10px;
            background: #fafafa;
        }
        .bot-msg, .user-msg{
            margin: 10px 0;
            padding: 10px;
            border-radius: 40px;
            max-width: 90%;
        }
        .bot-msg{
            background:  #eacdff;
            color:  #4b0082;
        }
        .user-msg{
            background: #e4c1fd;
            color: #460177;
            text-align: right;
            margin-left: auto;
        }
        form{
            display: flex;
        }
        input{
            flex: 1;
            padding: 10px;
            border: 1px solid silver;
            border-radius: 30px;
        }
        input::after{
            border: 1px solid silver;
        }
        button{
            padding: 10px 15px;
            background: #460177;
            color: #fff;
            border: none;
            border-radius: 20px;
            margin: 3px;
            cursor: pointer;
        }
        button:hover{
            background: #e4c1fd;
            color: #4b0082;
        }
    </style>
</head>
<body>
    <div class="chat ">
        <h2>En-Co</h2>
        <div class="chat-box" id="chat-box">
            <div class="bot-msg">Hi friend ! I'm En-co Tell me how you are feeling.</div>
        </div>
        <form action="en-co.php" id="chat-form">
            <input type="text" id="user-input" placeholder="Share your feelings...." required>
            <button type="submit">Send</button>
        </form>
    </div>


    <script>
        const form = document.getElementById('chat-form');
        const input = document.getElementById('user-input');
        const chatBox = document.getElementById('chat-box');

        form.addEventListener("submit", async(e) =>{
            e.preventDefault();
            const userText = input.value.trim();
            if(!userText) return;

            chatBox.innerHTML += `<div class="user-msg">${userText}</div>`;
            input.value = "";

            const response = await fetch ("bot.php", {
                method: "POST",
                headers: {"Content-Type": "application/x-www-form-urlencoded"},
                body:`message=${encodeURIComponent(userText)}`
            });

            const botReply = await response.text();
            chatBox.innerHTML += `<div class="bot-msg">${botReply}</div>`;
            chatBox.scrollTop = chatBox.scrollHeight;
        });
    </script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
</body>
</html>