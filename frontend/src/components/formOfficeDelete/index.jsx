import { useRef } from 'react';
import './style.css';
import { deleteOffice } from '../../hook/api-access';

export function FormOfficeDelete() {
  const idOfficeRef = useRef(0);

  async function handleRemoveOffice() {
    const id = idOfficeRef.current.value;
    try {
      await deleteOffice(id);
      alert('Cargo deletado com sucesso!')
    } catch (error) {
      alert(error.response.data.error)
    }
  }

  return (
    <div className="container-form">
      <h1>Formulario de Remoção de Cargo</h1>
      <input ref={idOfficeRef} type="number" placeholder="id do cargo"/>
      <button onClick={handleRemoveOffice}>Deletar</button>
    </div>
  );
}
