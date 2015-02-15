<?php

class CommentsController extends AppController {
    public $helpers = array('Html', 'Form');
    public function index() {
        $this->set('comments',$this->Comment->find('all'));
    }
    public function view($id=null){
        $this->Comment->id=$id;
        $this->set('comment',$this->Comment->read());

    }
    public function add() {
        if ($this->request->is('post')) {
            if ($this->Comment->save($this->request->data)) {
                $this->Session->setFlash('Success!');
                //postsのviewにpostsのidをわたす。次の一行によってたとえば/posts/view/20でお気に入り登録されたときに一瞬/comments/addにきてまた/posts/view/20にaddされた状態で返される
                $this->redirect(array('controller'=>'posts','action'=>'view',$this->data['Comment']['post_id']));
            } else {
                $this->Session->setFlash('failed!');
            }
        }
    }
    

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->request->is('ajax')) {
            if ($this->Comment->delete($id)) {
            $this->autoRender = false;
                $this->autoLayout = false;
                $response = array('id' => $id);
                $this->header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
        }
        $this->redirect(array('controller'=>'posts', 'action'=>'index',$id));
    }

    
    public function edit($id =null) {//$idがわたされる
        //渡されたidでModelから記事をひっぱってくるためにセット
        $this->Comment->id = $id;
        //$this->Comment->post_id=$post_id;
        //$post_id
        //GETでアクセスされた場合に編集用のフォームを開く
        if ($this->request->is('get')) {
            //フォームの中に引っ張ってきたモデルの中身をいれる
            $this->request->data = $this->Comment->read();
        } else {
            //ユーザがデータを編集してそのフォームがPOSTされた時の処理、まずデータの保存をする。
            
            if ($this->Comment->save($this->request->data)) {

                $this->Session->setFlash('success!');
              //お気に入りはこれでよかったのになんでこれでだめ？ $this->redirect(array('controller'=>'posts','action'=>'view',$this->data['Comment']['post_id']));
                //11/17 test
                 //$this->redirect(array('controller'=>'posts','action'=>'view',$this->data['Comment']['post_id']));

                //下のredirectでは/posts/view/$コメントのid  にリダイレクトされる。
                ///posts/view/$動画idにリダイレクトしたい
               //$this->redirect(array('controller'=>'posts','action'=>'view',$this->Comment->id));
                //暫定的にホームにリダイレクトするようにしとく 
               // $this->redirect(array('controller'=>'posts')); 

                //元のページへリダイレクとさせようとしたがうまくいかない
                
                $this->redirect(Router::url($this->referer(),true));
            } else {
                $this->Session->setFlash('failed!');
            }
        }
    }


}
