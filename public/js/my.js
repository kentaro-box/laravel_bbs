function del() {
    if(window.confirm('本当に削除しますか？')){

		location.href = "/delete"; 

	}
	else{

		window.alert('キャンセルされました'); 

	}
}