<form class="feedback-form" method="post">

    <div class="div-name">
        <label for="name">Name</label><br>
        <input class="input-name" type="text" id="name" placeholder="Name"></input>
    </div>


    <div class="div-email">
        <label for="email">Email</label><br>
        <input class="input-email" type="email" id="email" placeholder="Email"></input>
    </div>

    <div class="div-textarea">
        <label for="feedback">Feedback</label><br>
        <textarea class="feedback-textarea" id="feedback" rows="5" placeholder="Write your feedback."></textarea>
    </div>

    <div id="emoji-feedback" class="emoji-feedback">

        <div class="div-emoji-btn">
            <button class="emoji-btn" data-rating="1">😡</button><br>
            <span class="emoji-btn-label">Worst</span>
        </div>

        <div class="div-emoji-btn">
            <button class="emoji-btn" data-rating="2">😞</button><br>
            <span class="emoji-btn-label">Poor</span>
        </div>

        <div class="div-emoji-btn">
            <button class="emoji-btn" data-rating="3">😐</button><br>
            <span class="emoji-btn-label">Neutral</span>
        </div>

        <div class="div-emoji-btn">
            <button class="emoji-btn" data-rating="4">🙂</button><br>
            <span class="emoji-btn-label">Good</span>
        </div>

        <div class="div-emoji-btn">
            <button class="emoji-btn" data-rating="5">😃</button><br>
            <span class="emoji-btn-label">Excellent</span>
        </div>

    </div>

    <div class="div-submit-btn">
        <button class="submit-btn" type="submit">Submit</button>
    </div>
</form>