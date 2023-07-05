<?php

class User {
  private int $IdUsuario;
  private string $Nombre;	
  private string $Apellidos;	
  private string $Correo;	
  private string $Rol; 
  private string $Usuario;
  private string $Contrasenia;

  /** 
  * @param string $Nombre;	
  * @param string $Apellidos;	
  * @param string $Correo;	
  * @param string $Rol; 
  * @param string $Usuario;
  * @param string $Contrasenia;
  */

  public function __construct(int $IdUsuario = 0,	string $Nombre = "", string $Apellidos = "", string $Correo = "", string $Rol = "",	string $Usuario = "", string $Contrasenia = ""){
    $this->IdUsuario = $IdUsuario;
    $this->Nombre = $Nombre;
    $this->Apellidos = $Apellidos;
    $this->Correo = $Correo;
    $this->Rol = $Rol;
    $this->Usuario = $Usuario;
    $this->Contrasenia = $Contrasenia;
  }

    
  #region Set y Get

  /**
   * @return int
   */
  public function getIdUsuario(): int {
    return $this->IdUsuario;
  }

  /**
   * @param int $id
   */
  public function setIdUsuario(int $id): void {
    $this->IdUsuario = $id;
  }

  /**
   * @return string
   */
  public function getNombre(): string {
    return $this->Nombre;
  }

  /**
   * @param string $nombres
   */
  public function setNombre(string $Nombre): void {
    $this->Nombre = $Nombre;
  }

  /**
   * @return string
   */
  public function getApellidos(): string {
    return $this->Apellidos;
  }

  /**
   * @param string $Apellidos
   */
  public function setApellidos(string $Apellidos): void {
    $this->Apellidos = $Apellidos;
  }

  /**
   * @return string
   */
  public function getCorreo(): string {
    return $this->Correo;
  }

  /**
   * @param string $Correo
   */
  public function setCorreo(string $Correo): void {
    $this->Correo = $Correo;
  }

  /**
   * @return string
   */
  public function getRol(): string {
    return $this->Rol;
  }

  /**
   * @param string $Rol
   */
  public function setRol(string $Rol): void {
    $this->Rol = $Rol;
  }

  /**
   * @return string
   */
  public function getUsuario(): string {
    return $this->Usuario;
  }

  /**
   * @param string $Usuario
   */
  public function setUsuario(string $Usuario): void {
    $this->Usuario = $Usuario;
  }

  /**
   * @return string
   */
  public function getContrasenia(): string {
    return $this->Contrasenia;
  }

  /**
   * @param string $Contrasenia
   */
  public function setContrasenia(string $Contrasenia): void {
    $this->Contrasenia = $Contrasenia;
  }
}
?>