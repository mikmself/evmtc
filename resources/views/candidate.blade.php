<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stunning Candidate Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
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
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            gap: 40px;
            padding: 30px;
            max-width: 1400px;
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        .candidate-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            width: 320px;
            height: 500px;
            position: relative;
            transition: transform 0.3s;
        }
        .candidate-card:hover {
            transform: translateY(-10px);
        }
        .candidate-photo {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
        .candidate-content {
            padding: 25px;
            text-align: center;
            color: white;
        }
        .candidate-name {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
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
            margin-bottom: 25px;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        .btn {
            background-color: #836FFF;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 25px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn:hover {
            background-color: #F0F3FF;
            color: #211951;
            transform: translateY(-5px);
        }
        .modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.9);
            opacity: 0;
            background: rgba(33, 25, 81, 0.95);
            color: #F0F3FF;
            width: 85%;
            max-width: 600px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
            padding: 30px;
            z-index: 1000;
            transition: transform 0.5s ease, opacity 0.5s ease;
            visibility: hidden;
            text-align: left;
            line-height: 1.6;
        }
        .modal.active {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
            visibility: visible;
        }
        .modal-header {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }
        .modal-content {
            margin: 15px 0;
            font-size: 1rem;
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
            border-radius: 10px;
            padding: 10px 20px;
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
<div class="card-container">
    @foreach($candidates as $candidate)
        <div class="candidate-card">
            <img src="{{$candidate->photo}}" alt="{{$candidate->name}}" class="candidate-photo">
            <div class="candidate-content">
                <div class="candidate-name">{{$candidate->name}}</div>
                <div class="candidate-motto">"{{$candidate->motto}}"</div>
                <div class="btn-container">
                    <button class="btn" onclick="openVoteModal('{{$candidate->name}}',{{$candidate->id}})">Vote</button>
                    <button class="btn" onclick="openModal('modal-{{$candidate->id}}')">Detail</button>
                </div>
            </div>
        </div>
        <div class="modal" id="modal-{{$candidate->id}}">
            <div class="modal-header">{{$candidate->name}}</div>
            <div class="modal-content"><strong>Vision:</strong><br> {{$candidate->vision}}</div>
            <div class="modal-content"><strong>Mission:</strong><br> {{$candidate->mission}}</div>
            <button class="modal-btn" onclick="closeModal('modal-{{$candidate->id}}')">Close</button>
        </div>
    @endforeach
    <div class="modal" id="vote-modal">
        <div class="modal-header">Confirm Your Vote</div>
        <div id="vote-message" class="modal-content"></div>
        <div class="modal-buttons">
            <button class="modal-btn" onclick="confirmVote()">Yes</button>
            <button class="modal-btn" onclick="closeModal('vote-modal')">No</button>
        </div>
    </div>
</div>
<script>
    let selectedCandidate = "";
    let idCandidate = "";
    function closeModal(id) {
        document.getElementById(id).classList.remove('active');
    }
    function openVoteModal(candidate, id) {
        selectedCandidate = candidate;
        idCandidate = id;
        document.getElementById('vote-message').textContent = "Are you sure you want to vote for " + candidate + "?";
        document.getElementById('vote-modal').classList.add('active');
    }
    function openModal(id) {
        document.getElementById(id).classList.add('active');
    }
    function confirmVote() {
        fetch(`/vote/${idCandidate}`, { // Pastikan ini sesuai dengan kebutuhan
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '/thanks';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message,
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Something went wrong. Please try again later.',
                    confirmButtonText: 'OK'
                });
            });

        closeModal('vote-modal');
    }
</script>
</body>
</html>
