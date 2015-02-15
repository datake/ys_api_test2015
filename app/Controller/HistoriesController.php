<?php

class HistoriesController extends AppController {
    public $helpers = array('Html', 'Form');

/*
    //missing databaseがでたのでつけてみた
    public $name='Historys';//コントローラが使うメインのモデルの複数形
    public $uses=array('History','Post');
    var $useTable=false;
    */
      public function index() {
        $this->set('history',$this->History->find('all'));
    }





    public function add() {
        if ($this->request->is('post')) {
            if ($this->History->save($this->request->data)) {
                $this->Session->setFlash('Success!');
                //postsのviewにpostsのidをわたす
                //次の一行によってたとえば/posts/view/20でお気に入り登録されたときに一瞬/historys/addにきてまた/posts/view/20にaddされた状態で返される
                $this->redirect(array('controller'=>'posts','action'=>'view',$this->data['History']['post_id']));
            } else {
                $this->Session->setFlash('failed!');
            }
        }
    }
    /* public function add() {
         //this->Session->setFlash('aaaaaaaaaaaa');
        if ($this->request->is('history')) {
            $this->Session->setFlash('aaaaaaaaaaaa');
            if ($this->History->save($this->request->data)) {
                $this->Session->setFlash('Success!');
                //postsのviewにpostsのidをわたす
                //$this->redirect(array('controller'=>'histories','action'=>'view',$this->data['History']['post_id']));
            } else {
                $this->Session->setFlash('failed!');
            }
        }
    }*/


     public function delete($id) {
        //$this->Session->setFlash('public function delete($id)');
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->request->is('ajax')) {
            $this->Session->setFlash('ajax');
            if ($this->History->delete($id)) {
                $this->Session->setFlash('$this->History->delete($id)');
                $this->autoRender = false;
                $this->autoLayout = false;
                $response = array('id' => $id);
                $this->header('Content-Type: application/json');
                echo json_encode($response);

                exit();

            }
        }
        //ajaxでない場合
        $this->redirect(array('controller'=>'posts', 'action'=>'index',$id));
    }
    public function view($id=null){
        $this->History->id=$id;
        $this->set('history',$this->History->read());

    }
    public function user($id=null){
        $this->History->id=$id;
        $this->set('history',$this->History->read());

    }


/*

    public function edit() {
        if ($this->request->is('post')) {
            if ($this->History->save($this->request->data)) {
                $this->Session->setFlash('Success!');
                //postsのviewにpostsのidをわたす
                //次の一行によってたとえば/posts/view/20でお気に入り登録されたときに一瞬/historys/addにきてまた/posts/view/20にaddされた状態で返される
                $this->redirect(array('controller'=>'posts','action'=>'view',$this->data['History']['post_id']));
            } else {
                $this->Session->setFlash('failed!');
            }
        }
    }*/

    public function edit($id =null) {//$idがわたされる
        //渡されたidでModelから記事をひっぱってくるためにセット
        $this->History->id = $id;
        
        //GETでアクセスされた場合に編集用のフォームを開く
        if ($this->request->is('get')) {
            //フォームの中に引っ張ってきたモデルの中身をいれる
            $this->request->data = $this->History->read();
        } else {
            //ユーザがデータを編集してそのフォームがPOSTされた時の処理、まずデータの保存をする。
            
            if ($this->History->save($this->request->data)) {
                $this->Session->setFlash('success!');
                //$this->redirect(array('controller'=>'posts')); 
                //this->data['History']['post_id'])にリダイレクト
                 $this->redirect(array('controller'=>'posts','action'=>'view',$this->data['History']['post_id']));
            } else {
                $this->Session->setFlash('failed!');
            }
        }
    }




  }