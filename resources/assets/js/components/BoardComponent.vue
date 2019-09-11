<template>
  <div class="container-fluid">
        <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="panel">
                                <div class="sk-chat-widgets">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            BOARD LISTING
                                            <div class="chatonline">
                                                <div class="call-chat">
                                                    <button class="btn btn-success btn-circle btn-sm" type="button" v-on:click="addBoard()"><i class="fa fa-plus-square"></i></button>
                                                </div> 
                                            </div>
                                            <br>
                                            <form v-show="booleanAdd" @submit.prevent="createBoard()">
											  <div class="form-group">
											    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Board" v-model="board.board_title" autocomplete="off">
                                                
											  </div>
                                              <button type="submit" class="btn btn-primary btn-sm">add</button>
											 </form>
                                        </div>
                                        <div class="panel-body">
                                            <ul class="chatonline" v-for="board in boards" :key="board.id">
                                                <li v-show="id != board.id ? true : false">
                                                    <a :href="'/todoapp/'+board.id"><h5><b>{{board.board_title}}</b></h5></a>
                                                    <button class="btn btn-sm btn-warning" v-on:click="deleteBoard(board.id)"><i class="fa fa-trash-o"></i>
                                                    </button>&nbsp;<button class="btn btn-sm btn-danger" v-on:click="editShow(board.id)"><i class="fa fa-pencil"></i></button>
                                                </li>
                                                    <form v-show="board.id == id ? showFormUpdate : false">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="update Board" v-model="board.board_title" autocomplete="off">
                                                
                                                        </div>
                                                        <button type="button" @click.prevent="saveUpdateBoard(board)" class="btn btn-danger btn-sm">update</button>
                                                    </form>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
         </div>
  </div>
</template>

<script>

    export default {
    	props :['booleanAdd','showFormUpdate'],
        data(){
        	return{
        		boards:[],
                board:{
                    id:'',
                    board_title:'',
                    // csrf : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                id:'',
        	};
        },

        created(){
            this.fetchBoards();
        },

        methods: {
        	addBoard(){
        		this.$emit('changeAdd');
        	},
            fetchBoards(){
                fetch('/user/'+window.app.user).then(res => res.json())
                    .then(res => {
                        this.boards = res.data;
                    }).catch(err => console.log(err));
            },
            createBoard(){
                if (this.board.board_title==="") {
                    alert('data kosong');
                }else{
                    axios.post('/user/'+window.app.user+'/board',this.board)
                        .then(res => {
                            if (this.board.board_title!=='') {
                                this.$emit('changeAdd',false);
                                this.board.board_title = '';
                                this.fetchBoards();
                                alert('saving board success!');
                                console.log(this.add);
                            };
                        }).catch(err => console.log(err));
                    // fetch('/user/'+window.app.user+'/board',{
                    //     method: 'post',
                    //     body : JSON.stringify(this.board),
                    //     headers: {
                    //         'content-type' : 'application/json',
                    //         'X-CSRF-Token' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    //     },

                    // }).then(data => {
                    //     this.board.board_title = '';
                    //     this.fetchBoards();
                    //     alert('saving product success!');
                    //     console.log(window.app.csrfToken);
                    // }).catch(err => console.log(err)); 
                }
            },
            deleteBoard(id){
                if (confirm('are you sure delete board ??')) {
                    axios.delete('/user/board/'+id)
                        .then(data => {
                                alert('remove board is success');
                                this.fetchBoards();
                            }).catch(err => console.log(err));
                };
            },
            editShow(id){
                this.$emit('showFormEdit');
                this.id = id;
            },
            saveUpdateBoard(data){
                if (this.id == data.id) {
                    this.board.board_title = data.board_title;
                    if (this.board.board_title === '') {
                        alert('update board can not be empty!');
                    }else{
                        axios.put('/user/board/'+data.id,this.board)
                            .then(res => {
                                    this.id = '';
                                    this.board.board_title = '';
                                    this.fetchBoards();
                                    alert('update board success!');
                            }).catch(err => console.log(err)); 
                    }
                };
            },
        },
    }
</script>

<style scoped>
    ul li button.btn {
        display: none;
    }

    ul li a{
        display: inline-block;
        width:147px;
    }

    ul li:hover button.btn{
        display: inline;
    }
</style>
