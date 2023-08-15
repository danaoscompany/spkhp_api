<?php

class User extends CI_Controller {
  
  public function get_criterias() {
    $criterias = $this->db->query("SELECT * FROM `criterias` ORDER BY `name`")->result_array();
    echo json_encode($criterias);
  }
  
  public function add_criteria() {
    $name = $this->input->post('name');
    $type = intval($this->input->post('type'));
    $this->db->insert("criterias", array(
      'name' => $name,
      'type' => $type
    ));
  }
  
  public function update_criteria() {
      $criteriaID = intval($this->input->post('criteria_id'));
      $name = $this->input->post('name');
      $type = intval($this->input->post("type"));
      $this->db->query("UPDATE `criterias` SET `name`='".$name."', `type`=".$type." WHERE `id`=".$criteriaID);
    }
    
  public function delete_criteria() {
        $criteriaID = intval($this->input->post('criteria_id'));
        $this->db->query("DELETE FROM `criterias` WHERE `id`=".$criteriaID);
      }
  
  public function get_criteria_values() {
    $criteriaID = intval($this->input->post('criteria_id'));
    $values = $this->db->query("SELECT * FROM `criteria_values` WHERE `criteria_id`=".$criteriaID." ORDER BY `value`")->result_array();
    echo json_encode($values);
  }
  
  public function add_criteria_value() {
      $criteriaID = intval($this->input->post('criteria_id'));
      $value = $this->input->post('value');
      $weight = intval($this->input->post('weight'));
      $this->db->insert("criteria_values", array(
        'criteria_id' => $criteriaID,
        'value' => $value,
        'weight' => $weight
      ));
    }
    
  public function update_criteria_value() {
        $id = intval($this->input->post('id'));
        $value = $this->input->post('value');
        $weight = intval($this->input->post('weight'));
        $this->db->query("UPDATE `criteria_values` SET `value`='".$value."', `weight`=".$weight." WHERE `id`=".$id);
      }
      
  public function delete_criteria_value() {
          $id = intval($this->input->post('id'));
          $this->db->query("DELETE FROM `criteria_values` WHERE `id`=".$id);
        }
}