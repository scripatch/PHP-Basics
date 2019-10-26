
    <input type="text" id="val1" name="operand1" value="">
    <input type="text" id="val2" name="operand2" value="">
    <span id="buttons">
    <button class='action' name="add"> +</button>
    <button class='action' name="subtract"> -</button>
    <button class='action' name="multiply"> *</button>
    <button class='action' name="divide"> /</button>
    </span>
    =
    <input type="text" id="val3" value=""><br>

<script>
    window.onload = function () {
        console.log(document.getElementsByClassName('action'));
        document.getElementById('buttons').addEventListener('click', event => {
            event.preventDefault();
            (async () => {
                const response = await fetch('/apicalc/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        operand1: document.getElementById("val1").value,
                        operand2: document.getElementById("val2").value,
                        action_type: event.target.name
                    }), // body data type must match "Content-Type" header
                });
                const answer = await response.json();
                document.getElementById("val3").value = answer
                console.log(answer);
            })();
        });
    }

</script>