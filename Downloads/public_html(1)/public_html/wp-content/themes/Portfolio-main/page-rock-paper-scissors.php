<?php

/*
Template Name: Custom Rock Paper Scissors Bot
*/

get_header();
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rock Paper Scissors - Pyodide</title>
  <script src="https://cdn.jsdelivr.net/pyodide/v0.25.1/full/pyodide.js"></script>
  <style>
    body { font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 2em; padding-top: 2em;}
    button { margin: 0.5em; padding: 1em; font-size: 1em; }
    #output { white-space: pre-line; margin-top: 1em; }
  </style>
</head>
<body>
  <h1>Rock Paper Scissors</h1>
  <div>
    <button onclick="play('r')">Rock</button>
    <button onclick="play('p')">Paper</button>
    <button onclick="play('s')">Scissors</button>
    <button onclick="play('q')">quit</button>
  </div>
  <div id="output"></div>

  <script type="text/python" id="rps-script">
from js import document
import random

plays = ['Rock', 'Paper', 'Scissors']
wins = 0
losses = 0
ties = 0
timesr = 0
timesp = 0
timess = 0
timescompr = 0
timescompp = 0
timescomps = 0
gamesplayed = 0
output = []

def mostlikelyoutcome():
    if timesp > timesr and timesp > timess:
        return 'Scissors'
    elif timesr > timesp and timesr > timess:
        return 'Paper'
    elif timess > timesr and timess > timesp:
        return 'Rock'
    return random.choice(plays)

def play_move(userinput):
    global wins, losses, ties, timesr, timesp, timess
    global timescompr, timescompp, timescomps, gamesplayed
    
    if userinput == 'q':
        return showstats()

    compchoice = mostlikelyoutcome()

    if userinput == 'r':
        timesr += 1
        usermove = 'Rock'
    elif userinput == 'p':
        timesp += 1
        usermove = 'Paper'
    elif userinput == 's':
        timess += 1
        usermove = 'Scissors'
    else:
        return "Invalid move."

    if compchoice == 'Rock':
        timescompr += 1
    elif compchoice == 'Paper':
        timescompp += 1
    elif compchoice == 'Scissors':
        timescomps += 1

    result = f"You played {usermove}\nComputer played {compchoice}\n"

    if (compchoice=='Rock' and userinput == 's') or (compchoice=='Scissors' and userinput =='p') or (compchoice=='Paper' and userinput=='r'):
        losses += 1
        result += "Computer wins!"
       
        
        
    elif (userinput =='r' and compchoice == 'Scissors') or (userinput=='s' and compchoice=='Paper') or (userinput=='p' and compchoice=='Rock'):
        wins += 1
        result += "You win!"
        
        
    else:
        ties += 1
        result += "It's a tie."
        
        

    gamesplayed += 1
    return result
    

def showstats():
    return f"""
Game Over!\n-------------------\n
Games played: {gamesplayed}
Wins: {wins}
Losses: {losses}
Ties: {ties}
You played rock {timesr} times.
You played paper {timesp} times.
You played scissors {timess} times.
"""
  </script>

  <script>
    let pyodideReady = loadPyodide();

    async function play(move) {
      const pyodide = await pyodideReady;
      await pyodide.runPythonAsync(document.getElementById("rps-script").textContent);
      const result = pyodide.globals.get("play_move")(move);
      document.getElementById("output").textContent = result;
    }
  </script>
</body>
</html>
