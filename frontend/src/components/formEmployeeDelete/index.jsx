import { useRef } from 'react';
import './style.css';
import { deleteEmployee } from '../../hook/api-access';

export function FormEmployeeDelete() {
  const idEmployeeRef = useRef(0);

  async function handleRemoveEmployee() {
    const id = idEmployeeRef.current.value;

    try{
      let response = await deleteEmployee(id);
      alert(response.data);
    }catch(error){
      console.log(error.response.data);
      alert(error.response.data.error);
    }
  }

  return (
    <div className="container-form">
      <h1>Formulario de Remoção de Funcionario</h1>
      <input ref={idEmployeeRef} type="number" placeholder="id do funcionario"/>
      <button onClick={handleRemoveEmployee}>Deletar</button>
    </div>
  );
}
