<form id="insight_suite_feedback_form" class="feedback-form" method="post">

    <div class="div-name">
        <label for="name">Name</label><br>
        <input  id="inputName" class="input-name" type="text" placeholder="Name" required><br>
    </div>


    <div class="div-email">
        <label for="email">Email</label><br>
        <input class="input-email" id="inputEmail" type="email" id="email" placeholder="Email" required><br>
    </div>

    <div class="div-textarea">
        <label for="feedback">Feedback</label><br>
        <textarea id="feedbackTextarea" class="feedback-textarea" id="feedback" rows="5" placeholder="Write your feedback." required></textarea><br>
    </div>

    <div id="emoji-feedback" class="emoji-feedback">

        <div class="div-emoji-btn">
            <button type="button" class="emoji-btn" data-rating="worst">😡</button><br>
            <span class="emoji-btn-label">Worst</span>
        </div>

        <div class="div-emoji-btn">
            <button type="button" class="emoji-btn" data-rating="poor">😞</button><br>
            <span class="emoji-btn-label">Poor</span>
        </div>

        <div class="div-emoji-btn">
            <button type="button" class="emoji-btn" data-rating="neutral">😐</button><br>
            <span class="emoji-btn-label">Neutral</span>
        </div>

        <div class="div-emoji-btn">
            <button type="button" class="emoji-btn" data-rating="good">🙂</button><br>
            <span class="emoji-btn-label">Good</span>
        </div>

        <div class="div-emoji-btn">
            <button type="button" class="emoji-btn" data-rating="excellent">😃</button><br>
            <span class="emoji-btn-label">Excellent</span>
        </div>

    </div>

    <div class="div-submit-btn">
        <button id="submitBtn" class="submit-btn" type="submit" disabled >Submit</button>
    </div>
    <span id="feedbackMsg" class="feedback-message">Feedback Submitted.</span>
</form>