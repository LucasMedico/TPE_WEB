<?php
require_once './models/CommentModel.php';
include_once('./models/UserModel.php');
include_once('./models/ProductModel.php');
include_once('./helpers/auth.helper.php');
require_once './api/APIView.php';

class APIController {

    private $model;
    private $view;
    private $modelUser;
    private $modelProducto;

    public function __construct() {
        $this->model =  new CommentModel();
        $this->view = new APIView();
        $this->modelUser =  new UserModel();
        $this->modelProducto =  new ProductModel();
    }

    public function getProductComments($params = [])
    { 
        if (!empty($params)) {
            $id_producto = $params[':ID'];
            $listComment = $this->model->getProductComments($id_producto);
            if ($listComment)
                $this->view->response($listComment, 200);
            else
                $this->view->response("Sin comentarios", 200);     
        }
        else
           $this->view->response(null, 404);
    } 

    public function deleteProductComment($params = [])
    {
        $authHelper = new AuthHelper();
        $userLogged = $authHelper->getLoggedUserName();
        if  (   (!(is_null($userLogged))) && ($authHelper->isAdmin())    )
        {
            if (!empty($params)) {
                $id = $params[':ID'];
                $result = $this->model->getComment($id);
                if (!empty($result)) {
                    $result = $this->model->deleteComment($id);
                    $this->view->response($result, 200);
                }
                else {
                    $this->view->response(null, 500);
                }
            }
            else {
                $this->view->response(null, 404);
            }
        }else {
            if (!($authHelper->isAdmin())){
                $this->view->response(false, 405);
            }else{
                $this->view->response(false, 404);
            }
        }
    }

    public function newProductComment($params = [])
    {
        $params = json_decode(file_get_contents("php://input"));
        $producto = $this->modelProducto->getProductById($params->product);
        
        // RECUPERA EL USUARIO ACTIVO
        $authHelper = new AuthHelper();
        $userLogged = $authHelper->getLoggedUserName();
        if  (   (!(is_null($producto))) && (!(is_null($userLogged)))    )
        {
            $user = $this->modelUser->getUserByUsername($userLogged);
            $result = $this->model->newProductComment($producto->id_prod, $user->ID_usuario, $params->calificacion, $params->comentario);
            if ($result)
                $this->view->response($result, 200);
            else
                $this->view->response(null, 500);
        }
        else
            $this->view->response(null, 404);
    }
}
?>