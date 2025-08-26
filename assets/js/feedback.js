document.addEventListener("DOMContentLoaded", () => {

    const emojiBtns = document.querySelectorAll(".emoji-btn");

    let selectedRating = "neutral";

    document.querySelector('.emoji-btn[data-rating="neutral"]').classList.add("selected");

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
    const inputName = document.getElementById("inputName");
    const inputEmail = document.getElementById("inputEmail");
    const inputFeedback = document.getElementById("feedbackTextarea");
    //Spans.
    const emailError = document.getElementById("emailError");
    const feedbackError = document.getElementById("feedbackTextareaError");
    const nameError = document.getElementById("nameError");

    

    function validateName()
    {
        if (inputName.value.trim() === "") {
            nameError.textContent = "This field is required.";
            return false;
        }
        nameError.textContent = "";
        return true; 
        
    }

    function validateEmail() {
        if (inputEmail.value.trim() === "" ) {
            emailError.textContent = "This field is required.";
            return false;
        }
        if (inputEmail.checkValidity()) {
            emailError.textContent = "";
            return true;
        } else {
            emailError.textContent = "Email format is incorrect.";
            return false;
        }
    }

    function validateFeedback() {
        if (inputFeedback.value.trim() === "" ) {
            feedbackError.textContent = "You did not give the feedback.";
            return false;
        }
        feedbackError.textContent = "";
        return true;
    }

    function validateForm() {
    const isValid = validateEmail() && validateFeedback() && validateName();
    const submitBtn = document.getElementById("submitBtn");
    if (isValid) {
        submitBtn.classList.add("enabled");
        submitBtn.disabled = false;
    } else {
        submitBtn.classList.remove("enabled");
        submitBtn.disabled = true;
    }
    }


    inputName.addEventListener("input" , validateName, validateForm);
    inputEmail.addEventListener("input" , validateEmail, validateForm);
    inputFeedback.addEventListener("input", validateFeedback, validateForm);


    

    document.getElementById("insight_suite_feedback_form").addEventListener("submit", submitFeedback);

    function submitFeedback(event) {
        event.preventDefault();

        const userName = inputName.value;
        const userEmail = inputEmail.value;
        const userFeedback = inputFeedback.value;
        const userRating = selectedRating;

        
        fetch(myPluginData.restUrl, {
            method: 'POST',
            headers: {
                'Content-type': 'application/json',
                'X-WP-Nonce': myPluginData.nonce
            },
            body: JSON.stringify ({
                name: userName,
                email: userEmail,
                feedback: userFeedback,
                type: userRating,
            })
        } )




    }
    







})