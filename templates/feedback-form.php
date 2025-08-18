<form>
    <label for="name">Name</label><br>
    <input type="text" id="name"></input><br>
    <label for="email">Email</label><br>
    <input type="text" id="email"></input> <br>
    <label for="feedback">Feedback</label><br>
    <textarea id="feedback" rows="5" placeholder="Write your feedback."></textarea><br>
    <div id="emoji-feedback" class="emoji-feedback">
        <button class="emoji-btn" data-rating="1">😡</button>
        <button class="emoji-btn" data-rating="2">😞</button>
        <button class="emoji-btn" data-rating="3">😐</button>
        <button class="emoji-btn" data-rating="4">🙂</button>
        <button class="emoji-btn" data-rating="5">😃</button>
    </div>
    <button class="submit-btn" type="submit" >Submit</button>
</form>