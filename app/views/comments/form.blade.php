<div id='reply'>
    <h2>Leave a Reply</h2>
        <div data-alert class="alert-box round" style="display:none" id="success"></div>
                <form action="{{route('form', $post->id)}}" method="post" id="ajaxformcomment">
            <div class="row">
                <div class="large-5 column">
                    <label for="commenter">Name:</label>
                    <input type="text" name="commenter" id="commenter">
                </div>
            </div>
            <div class="row">
                <div class="large-5 column">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email">
                </div>
            </div>
            <div class="row">
                <div class="large-7 column">
                    <label for="comment">Comment:</label>
                    <input type="text" name="comment" id="comment">
                </div>
            </div>
        <div data-alert class="alert-box warning round" style="display:none" id="warning"></div>
                    <input type="submit" value="submit" class="button tiny radius" id="submit">
        </form>

</div>
