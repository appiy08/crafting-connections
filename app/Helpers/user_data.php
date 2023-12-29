<?

function getUserData($param)
{
    $session = session();
    $res = $session->get($param);
    if ($res) {
        return $res;
    } else {
        return "";
    }
}
