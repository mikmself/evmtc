<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stunning Candidate Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Body with animated gradient background */
        body {
            background: linear-gradient(135deg, #836FFF, #211951, #F0F3FF);
            background-size: 300% 300%;
            animation: gradientShift 12s infinite alternate;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        /* Container for cards */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 20px;
            max-width: 1200px;
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Candidate card with animated glow */
        .candidate-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 280px;
            height: 460px;
            position: relative;
        }

        .candidate-photo {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .candidate-content {
            padding: 20px;
            text-align: center;
            color: white;
        }

        .candidate-name {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #F0F3FF;
            animation: nameGlow 3s infinite alternate;
        }

        @keyframes nameGlow {
            0% { text-shadow: 0 0 5px #836FFF, 0 0 10px #836FFF; }
            100% { text-shadow: 0 0 20px #836FFF, 0 0 40px #836FFF; }
        }

        .candidate-motto {
            font-style: italic;
            color: #D1C4E9;
            margin-bottom: 20px;
        }

        /* Button styles */
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn {
            background-color: #836FFF;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            background-color: #F0F3FF;
            color: #211951;
            transform: translateY(-3px);
        }

        /* Modal styles */
        .modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.8);
            opacity: 0;
            background: #211951;
            color: white;
            width: 90%;
            max-width: 400px;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            padding: 20px;
            z-index: 1000;
            transition: transform 0.6s ease, opacity 0.6s ease;
            visibility: hidden;
            text-align: center;
        }

        .modal.active {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
            visibility: visible;
        }

        .modal-header {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .modal-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .modal-btn {
            background-color: #836FFF;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .modal-btn:hover {
            background-color: #F0F3FF;
            color: #211951;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<!-- Candidate Cards Container -->
<div class="card-container">
    <div class="candidate-card">
        <img src="https://images.unsplash.com/photo-1562159278-1253a58da141?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="John Doe" class="candidate-photo">
        <div class="candidate-content">
            <div class="candidate-name">John Doe</div>
            <div class="candidate-motto">"Unity and Progress"</div>
            <div class="btn-container">
                <button class="btn" onclick="openVoteModal('John Doe')">Vote</button>
                <button class="btn" onclick="openModal('modal-john')">Detail</button>
            </div>
        </div>
    </div>

    <div class="candidate-card">
        <img src="https://images.unsplash.com/photo-1562159278-1253a58da141?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Jane Smith" class="candidate-photo">
        <div class="candidate-content">
            <div class="candidate-name">Jane Smith</div>
            <div class="candidate-motto">"Hope and Change"</div>
            <div class="btn-container">
                <button class="btn" onclick="openVoteModal('Jane Smith')">Vote</button>
                <button class="btn" onclick="openModal('modal-jane')">Detail</button>
            </div>
        </div>
    </div>
</div>

<!-- Custom Vote Confirmation Modal -->
<div class="modal" id="vote-modal">
    <div class="modal-header">Confirm Your Vote</div>
    <div id="vote-message" class="modal-content"></div>
    <div class="modal-buttons">
        <button class="modal-btn" onclick="confirmVote()">Yes</button>
        <button class="modal-btn" onclick="closeModal('vote-modal')">No</button>
    </div>
</div>

<!-- Candidate Detail Modals -->
<div class="modal" id="modal-john">
    <div class="modal-header">John Doe</div>
    <div class="modal-content"><strong>Vision:</strong> To lead with integrity and transparency.</div>
    <div class="modal-content"><strong>Mission:</strong> Improve education, healthcare, and economic growth.</div>
    <button class="modal-btn" onclick="closeModal('modal-john')">Close</button>
</div>

<div class="modal" id="modal-jane">
    <div class="modal-header">Jane Smith</div>
    <div class="modal-content"><strong>Vision:</strong> To create a brighter future.</div>
    <div class="modal-content"><strong>Mission:</strong> Invest in education, sustainability, and social justice.</div>
    <button class="modal-btn" onclick="closeModal('modal-jane')">Close</button>
</div>

<script>
    let selectedCandidate = "";

    function openVoteModal(candidate) {
        selectedCandidate = candidate;
        document.getElementById('vote-message').textContent = "Are you sure you want to vote for " + candidate + "?";
        document.getElementById('vote-modal').classList.add('active');
    }

    function confirmVote() {
        alert("You have successfully voted for " + selectedCandidate + "!");
        closeModal('vote-modal');
    }

    function openModal(id) {
        document.getElementById(id).classList.add('active');
    }

    function closeModal(id) {
        document.getElementById(id).classList.remove('active');
    }
</script>

</body>
</html>
