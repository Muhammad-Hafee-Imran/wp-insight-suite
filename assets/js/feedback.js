document.addEventListener("DOMContentLoaded", () => {

    document.getElementById("submitBtn").removeAttribute("disabled");

    let selectedRating = "neutral";

    document.querySelector('.emoji-btn[data-rating="neutral"]').classList.add("selected");

    const emojiBtns = document.querySelectorAll(".emoji-btn");
    emojiBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            emojiBtns.forEach(mybtn => {
                if (mybtn.classList.contains("selected")) {
                    mybtn.classList.remove("selected");
                }
            })
            btn.classList.add("selected");
            selectedRating = btn.dataset.rating;
        })
    })

    //Input fields.
    const inputName = document.getElementById("inputName");
    const inputEmail = document.getElementById("inputEmail");
    const inputFeedback = document.getElementById("feedbackTextarea");

    document.getElementById("insight_suite_feedback_form").addEventListener("submit", submitFeedback);

    function submitFeedback(event) {
        event.preventDefault();

        const userName = inputName.value;
        const userEmail = inputEmail.value;
        const userFeedback = inputFeedback.value;
        const userRating = selectedRating;
        console.log(myPluginData.restUrl);
        console.log(myPluginData.nonce);
        fetch(myPluginData.restUrl, {
            method: 'POST',
            headers: {
                'Content-type': 'application/json',
                'X-WP-Nonce': myPluginData.nonce
            },
            body: JSON.stringify({
                name: userName,
                email: userEmail,
                feedback: userFeedback,
                type: userRating,
            })
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Server error:" + response.status);
                }
                return response.json();
            })
            .then(data => {
                inputName.value = "";
                inputEmail.value = "";
                inputFeedback.value = "";
                document.querySelector('.emoji-btn.selected').classList.remove("selected");
                document.querySelector('.emoji-btn[data-rating="neutral"]').classList.add("selected");
                setInterval(() => {
                    document.getElementById("feedbackMsg").style.display = "block";
                }, 5000)
            })
            .catch(error => {
                console.error("Caught error: ", error);
                alert("Something went wrong. " + error.message)
            })
    }
})