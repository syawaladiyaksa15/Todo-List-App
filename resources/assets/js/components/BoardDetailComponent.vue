<template>
	<div class="container-fluid">
		<div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <section>
                                <h3 class="box-title">{{boardTitle}}</h3>
                                <div class="clearfix">
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                    	<h4 class="text-center box-title">TO DO</h4>
                                    	<div class="card border-success mb-3" style="width: 100%;">
  											<div class="card-header border-success bg-transparent">
  												<form class="form-inline" @submit.prevent="edit ? updateTodo(todo.id) : postTodo()">
  													<div class="form-group">
    													<input type="text" class="form-control" placeholder="new todo" v-model="todo.todo_title" autocompleted="false">
  														<button type="submit" class="btn btn-success btn-sm">{{edit ? 'Edit' : 'Add'}}</button>
  													</div>
												</form>
  											</div>
  											<div class="card-body text-success">
  												<ul v-for="todo in todos" :key="todo.id">
  													<li>
  														<h5 class="card-title">{{todo.todo_title}}</h5>
    													<button class="btn btn-sm btn-warning" v-on:click="deleteTodo(todo.id)"><i class="fa fa-trash-o"></i>
                              </button>&nbsp;
                              <button class="btn btn-sm btn-danger" v-on:click="editTodo(todo)"><i class="fa fa-pencil"></i></button>&nbsp;
                              <div class="dropdown">
                                <button class="dropbtn btn btn-sm btn-primary"><i class="fa fa-exchange"></i></button>
                                <div class="dropdown-content">
                                  <a href="javascript:void(0)" v-on:click="todoMoveDo(todo.id,todo.todo_title)">move do</a>
                                  <a href="javascript:void(0)" v-on:click="todoMoveDone(todo.id,todo.todo_title)">move done</a>
                                </div>
                              </div>
  													</li>
  												</ul>
    											
  											</div>
  											<div class="card-footer bg-transparent border-success">TO DO</div>
										</div>
                                 	</div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                    	<h4 class="text-center box-title">DO</h4>
                                    	<div class="card border-warning mb-3" style="width: 100%;">
  											<div class="card-header bg-transparent border-warning">
  												<form class="form-inline" @submit.prevent="edit_do ? updateDo(doo.id) : postDo()">
  													<div class="form-group">
    													<input type="text" class="form-control" placeholder="new do" v-model="doo.do_title" autocompleted="false">
  														<button type="submit" class="btn btn-warning btn-sm">{{edit_do ? 'Edit' : 'Add'}}</button>
  													</div>
												</form>
  											</div>
  											<div class="card-body text-warning">
  												<ul v-for="doo in doos" :key="doo.id">
  													<li>
  														<h5 class="card-title">{{doo.do_title}}</h5>
  														<button class="btn btn-sm btn-warning" v-on:click="deleteDo(doo.id)"><i class="fa fa-trash-o"></i>
                              </button>&nbsp;
                              <button class="btn btn-sm btn-danger" v-on:click="editDo(doo)"><i class="fa fa-pencil"></i></button>&nbsp;
                              <div class="dropdown">
                                <button class="dropbtn btn btn-sm btn-primary"><i class="fa fa-exchange"></i></button>
                                <div class="dropdown-content">
                                  <a href="javascript:void(0)" v-on:click="doMoveTodo(doo.id,doo.do_title)">move todo</a>
                                  <a href="javascript:void(0)" v-on:click="doMoveDone(doo.id,doo.do_title)">move done</a>
                                </div>
                              </div>
  													</li>
  												</ul>
    											
  											</div>
  											<div class="card-footer bg-transparent border-warning">DO</div>
										</div>
									</div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                    	<h4 class="text-center box-title">DONE</h4>
                                    	<div class="card border-primary mb-3" style="width: 100%;">
  											<div class="card-header bg-transparent border-primary">
  												<form class="form-inline" @submit.prevent="edit_done ? updateDone(done.id) : postDone()">
  													<div class="form-group">
    													<input type="text" class="form-control" placeholder="new done" v-model="done.done_title" autocompleted="false">
    													<button type="submit" class="btn btn-primary btn-sm">{{edit_done ? 'Edit' : 'Add'}}</button>
  													</div>
												</form>
  											</div>
  											<div class="card-body text-primary">
  												<ul v-for="done in dones" :key="done.id">
  													<li>
  														<h5 class="card-title">{{done.done_title}}</h5>
  														<button class="btn btn-sm btn-warning" v-on:click="deleteDone(done.id)"><i class="fa fa-trash-o"></i>
                              </button>&nbsp;
                              <button class="btn btn-sm btn-danger" v-on:click="editDone(done)"><i class="fa fa-pencil"></i></button>&nbsp;
                              <div class="dropdown">
                                <button class="dropbtn btn btn-sm btn-primary"><i class="fa fa-exchange"></i></button>
                                <div class="dropdown-content">
                                  <a href="javascript:void(0)" v-on:click="doneMoveTodo(done.id,done.done_title)">move todo</a>
                                  <a href="javascript:void(0)" v-on:click="doneMoveDo(done.id,done.done_title)">move do</a>
                                </div>
                              </div>
  													</li>
  												</ul>
  											</div>
  											<div class="card-footer bg-transparent border-primary">DONE</div>
										</div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
	</div>
</template>

<script>
	export default{
		data(){
			return{
        boardTitle : window.app.title,
				todos : [],
				todo : {
					id: '',
					todo_title:'',
				},
				doos :[],
				doo:{
					id: '',
					do_title:'',
				},
				dones :[],
				done:{
					id: '',
					done_title:'',
				},
        edit : false,
        edit_do : false,
        edit_done : false,
			}
		},
		created(){
			this.fetchTodo();
			this.fetchDo();
			this.fetchDone();
		},
		methods: {
			fetchTodo(){
				fetch('/user/'+window.app.user+'/board/'+window.app.id+'/todo').then(res => res.json())
                    .then(res => {
                        this.todos = res.data;
                    }).catch(err => console.log(err));
			},
			fetchDo(){
				fetch('/user/'+window.app.user+'/board/'+window.app.id+'/do').then(res => res.json())
                    .then(res => {
                        this.doos = res.data;
                    }).catch(err => console.log(err));
			},
			fetchDone(){
				fetch('/user/'+window.app.user+'/board/'+window.app.id+'/done').then(res => res.json())
                    .then(res => {
                        this.dones = res.data;
                    }).catch(err => console.log(err));
			},
      postTodo(){
        if (this.todo.todo_title === '') {
          alert('todo can not be empty!!');
        }else{
          axios.post('/board/'+window.app.id+'/todo',this.todo)
                        .then(res => {
                              this.todo.todo_title = '';
                              this.fetchTodo();
                              alert('saving todo success!');
                        }).catch(err => console.log(err));
        }
      },
      postDo(){
        if (this.doo.do_title === '') {
          alert('do can not be empty!!');
        }else{
          axios.post('/board/'+window.app.id+'/do',this.doo)
                        .then(res => {
                              this.doo.do_title = '';
                              this.fetchDo();
                              alert('saving do success!');
                        }).catch(err => console.log(err));
        }
      },
      postDone(){
        if (this.done.done_title === '') {
          alert('done can not be empty!!');
        }else{
          axios.post('/board/'+window.app.id+'/done',this.done)
                        .then(res => {
                              this.done.done_title = '';
                              this.fetchDone();
                              alert('saving done success!');
                        }).catch(err => console.log(err));
        }
      },
      deleteTodo(id){
                if (confirm('are you sure delete todo ??')) {
                    axios.delete('/board/todo/'+id)
                        .then(data => {
                                alert('remove todo is success');
                                this.fetchTodo();
                            }).catch(err => console.log(err));
                };
      },
      deleteDo(id){
        if (confirm('are you sure delete do ??')) {
                    axios.delete('/board/do/'+id)
                        .then(data => {
                                alert('remove do is success');
                                this.fetchDo();
                            }).catch(err => console.log(err));
                };
      },
      deleteDone(id){
        if (confirm('are you sure delete done ??')) {
                    axios.delete('/board/done/'+id)
                        .then(data => {
                                alert('remove done is success');
                                this.fetchDone();
                            }).catch(err => console.log(err));
                };
      },
      doneMoveTodo(id,done_title){
        let data = {
          id : '',
          todo_title : done_title,
        };
        if (confirm('are you sure move to todo ??')) {
                    axios.delete('/board/done/'+id)
                        .then(data => {
                                this.fetchDone();
                            }).catch(err => console.log(err));
                    axios.post('/board/'+window.app.id+'/todo',data)
                        .then(res => {
                              this.fetchTodo();
                        }).catch(err => console.log(err));
        };
      },
      doneMoveDo(id,done_title){
        let data = {
          id : '',
          do_title : done_title,
        };
        if (confirm('are you sure move to do ??')) {
                    axios.delete('/board/done/'+id)
                        .then(data => {
                                this.fetchDone();
                            }).catch(err => console.log(err));
                    axios.post('/board/'+window.app.id+'/do',data)
                        .then(res => {
                              this.fetchDo();
                        }).catch(err => console.log(err));
        };
      },
      doMoveTodo(id,do_title){
        let data = {
          id : '',
          todo_title : do_title,
        };
        if (confirm('are you sure move to todo ??')) {
                    axios.delete('/board/do/'+id)
                        .then(data => {
                                this.fetchDo();
                            }).catch(err => console.log(err));
                    axios.post('/board/'+window.app.id+'/todo',data)
                        .then(res => {
                              this.fetchTodo();
                        }).catch(err => console.log(err));
        };
      },
      doMoveDone(id,do_title){
        let data = {
          id : '',
          done_title : do_title,
        };
        if (confirm('are you sure move to done ??')) {
                    axios.delete('/board/do/'+id)
                        .then(data => {
                                this.fetchDo();
                            }).catch(err => console.log(err));
                    axios.post('/board/'+window.app.id+'/done',data)
                        .then(res => {
                              this.fetchDone();
                        }).catch(err => console.log(err));
        };
      },
      todoMoveDo(id,todo_title){
        let data = {
          id : '',
          do_title : todo_title,
        };
        if (confirm('are you sure move to do ??')) {
                    axios.delete('/board/todo/'+id)
                        .then(data => {
                                this.fetchTodo();
                            }).catch(err => console.log(err));
                    axios.post('/board/'+window.app.id+'/do',data)
                        .then(res => {
                              this.fetchDo();
                        }).catch(err => console.log(err));
        };
      },
      todoMoveDone(id,todo_title){
        let data = {
          id : '',
          done_title : todo_title,
        };
        if (confirm('are you sure move to done ??')) {
                    axios.delete('/board/todo/'+id)
                        .then(data => {
                                this.fetchTodo();
                            }).catch(err => console.log(err));
                    axios.post('/board/'+window.app.id+'/done',data)
                        .then(res => {
                              this.fetchDone();
                        }).catch(err => console.log(err));
        };
      },
      editTodo(todo){
        this.edit = true;
        this.todo.id = todo.id;
        this.todo.todo_title = todo.todo_title;
      },
      updateTodo(id){
        if (this.todo.todo_title === '') {
                        alert('update todo can not be empty!');
                    }else{
                        axios.put('/board/todo/'+id,this.todo)
                            .then(res => {
                                    this.todo.id = '';
                                    this.todo.todo_title = '';
                                    this.edit = false;
                                    this.fetchTodo();
                                    alert('update todo success!');
                            }).catch(err => console.log(err)); 
                    }
      },
      editDo(doo){
        this.edit_do = true;
        this.doo.id = doo.id;
        this.doo.do_title = doo.do_title;
      },
      updateDo(id){
        if (this.doo.do_title === '') {
                        alert('update do can not be empty!');
                    }else{
                        axios.put('/board/do/'+id,this.doo)
                            .then(res => {
                                    this.doo.id = '';
                                    this.doo.do_title = '';
                                    this.edit_do = false;
                                    this.fetchDo();
                                    alert('update do success!');
                            }).catch(err => console.log(err)); 
                    }
      },
      editDone(done){
        this.edit_done = true;
        this.done.id = done.id;
        this.done.done_title = done.done_title;
      },
      updateDone(id){
        if (this.done.done_title === '') {
                        alert('update done can not be empty!');
                    }else{
                        axios.put('/board/done/'+id,this.done)
                            .then(res => {
                                    this.done.id = '';
                                    this.done.done_title = '';
                                    this.edit_done = false;
                                    this.fetchDone();
                                    alert('update done success!');
                            }).catch(err => console.log(err)); 
                    }
      },
		}
	}
</script>

<style scoped>
p.card-text {
	white-space:normal;
}

.form-control {
	width: 190px;
	height: 33px !important;
}

h5.card-title {
	display: inline-block;
	margin-right: 20px;
}

ul {
	list-style-type:none;
	margin: 0;
    padding: 0;
}

ul li button {
	display: none;
}

ul li:hover button {
	display: inline-block;
}

.dropbtn {
    background-color: #4CAF50;
    color: white;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 5px 7px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>