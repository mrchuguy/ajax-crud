<h2>News</h2>
<button id="btn_add">add news</button>
<div id="news"></div>
<div id="modal_add">
    <button onclick="$('#modal_add').css('display','none')" title="close">X</button>
    <form method="post" enctype="multipart/form-data" id="form_add">	
	<label>Title
	    <input type="text" name="title" id="title"/>
	</label>
	<label>Text
	    <textarea name="text" id="text"></textarea>
	</label>
	<label> Добавить картинку: 
	    <input type="file" name="image" accept="image/*" id="image"/>
	</label>
            <input type="submit" value="ADD NEWS"/>
    </form>
</div>
<div id="modal_update">
    <button onclick="$('#modal_update').css('display','none')" title="close">X</button>
    <div id="modal_update_form"></div>
</div>
