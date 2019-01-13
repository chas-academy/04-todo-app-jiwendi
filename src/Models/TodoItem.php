<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        $date = date('Y-m-d H:i:s');
        $completed = false;
        try {
            $query = "INSERT INTO todos (title, created)
             VALUES('$title','$date')";
                
            self::$db->query($query);
            $result = self::$db->execute();

            if (!empty($result)) {
                    return $result;
            } else {
                    throw new \Exception("Error occured when trying to fetch result.");
            }
        } catch (PDOException $err) {
                return $err->getMessage();
        }
    }

    public static function updateTodo($todoId, $title, $completed = null)
    {
        try {
                $query = "UPDATE todos 
                 SET title = '$title'
                 WHERE id = '$todoId'";
                    
                 
                self::$db->query($query);
                $result = self::$db->execute();
    
            if (!empty($result)) {
                    return $result;
            } else {
                    throw new \Exception("Error occured when trying to fetch result.");
            }
        } catch (PDOException $err) {
                return $err->getMessage();
        }
    }

        

    public static function deleteTodo($todoId)
    {
        try{ 
            $query = "DELETE FROM todos WHERE id ='$todoId'";
            self::$db->query($query);
            $result = self::$db->execute();

            if (!empty($result)) {
                return $result;
            } else {
                throw new \Exception("Error occured when trying to fetch result.");
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
        
            
    }

    
    // (Optional bonus methods below)
   /*   public static function toggleTodos($completed)
    {
        try {
           
            //$completed = true;
            $query = "UPDATE todos 
             SET completed = '$completed'";
            self::$db->query($query);
            $result = self::$db->execute();

            if (!empty($result)) {
                return $result;
            } else {
                throw new \Exception("Error occured when trying to fetch result.");
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }  */

   /*  public static function clearCompletedTodos()
    {
        try{ 
            $query = "DELETE * FROM todos WHERE completed = 'true'";
            self::$db->query($query);
            $result = self::$db->execute();

            if (!empty($result)) {
                return $result;
            } else {
                throw new \Exception("Error occured when trying to fetch result.");
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
        // TODO: Implement me!
        // This is to delete all the completed todos from the database
    } */

}
