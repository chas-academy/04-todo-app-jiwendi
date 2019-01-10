<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    // public static function createTodo($title)
    // {
    //     // TODO: Implement me!
    //     // Create a new todo
    // }

     public static function updateTodo($todoId, $title, $completed = null)
     {
        try {
                $query = "UPDATE todos 
                 SET id = '$todoId',
                     title = '$title',
                     completed = '$completed'
                 ";
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
    // public static function toggleTodos($completed)
    // {
    //     // TODO: Implement me!
    //     // This is to toggle all todos either as completed or not completed
    // }

    // public static function clearCompletedTodos()
    // {
    //     // TODO: Implement me!
    //     // This is to delete all the completed todos from the database
    // }

}
