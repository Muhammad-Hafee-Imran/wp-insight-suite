document.addEventListener("DOMContentLoaded", () => {

    const emojiBtns = document.querySelectorAll(".emoji-btn");

    let selectedRating = "neutral";

    emojiBtns.forEach(btn => {
        if (btn.dataset.rating == "neutral") {
            btn.classList.add("selected");
        }
    });

    emojiBtns.forEach(btn => {
        btn.addEventListener("click", (event) => {
            event.preventDefault();
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
    let inputName = document.getElementById("inputName");
    let inputEmail = document.getElementById("inputEmail");
    let inputFeedback = document.getElementById("feedbackTextarea");
    //Spans.
    let emailError = document.getElementById("emailError");
    let feedbackError = document.getElementById("feedbackTextareaError");
    let nameError = document.getElementById("nameError");



    document.getElementById("submitBtn").addEventListener("click", (event) => {

        event.preventDefault();

        if (inputName.value.trim() === "") {
            nameError.textContent = "This field is required."

            inputName.addEventListener("input", () => {
                if (inputName.value.trim() != "") {
                    nameError.textContent = "";
                }
            })
        }

        if (inputEmail.value.trim() === "") {
            emailError.textContent = "This field is required.";
            inputEmail.addEventListener("input", () => {
                if (inputEmail.value.trim() !== "") {
                    emailError.textContent = "";
                }
            });
        } else if (!inputEmail.checkValidity()) {
            emailError.textContent = "Email format is incorrect.";
            inputEmail.addEventListener("input", () => {
                if (inputEmail.checkValidity()) {
                    emailError.textContent = "";
                }
            });
        } else {
            emailError.textContent = ""; 
        }


        if (inputFeedback.value.trim() === "") {
            feedbackError.textContent = "Feedback field is required.";
            inputFeedback.addEventListener("input", () => {
                if (inputFeedback.value.trim() != "") {
                    feedbackError.textContent = "";
                }

            })
        }


        if (inputName.value.trim() !== "" && inputFeedback.value.trim() !== "" && inputEmail.checkValidity()) {
        //fetch code here
    }


    });

    







})