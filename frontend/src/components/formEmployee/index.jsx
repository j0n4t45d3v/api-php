import { useEffect, useRef, useState } from 'react';
import {
  getOffice,
  insertEmployee,
  updateEmployee,
} from '../../hook/api-access';
import './style.css';

export function FormEmployee({
  idProp,
  updateOrRegister,
  nameProp,
  lastnameProp,
  officeProp,
  birthdateProp,
  salaryProp,
}) {
  const nameRef = useRef('');
  const lastnameRef = useRef('');
  const officeRef = useRef(0);
  const birthdateRef = useRef('');
  const salaryRef = useRef(0);
  const [offices, setOffices] = useState([{}]);

  useEffect(() => {
    const asyncFetch = async () => {
      const officesFound = (await getOffice()).data.offices;
      console.log(officesFound);
      setOffices(officesFound);
    };
    asyncFetch();
  }, []);

  async function handleAddEmployee() {
    const name = nameRef.current.value;
    const lastname = lastnameRef.current.value;
    const office = officeRef.current.value;
    const birthdate = birthdateRef.current.value;
    const salary = salaryRef.current.value;

    const employee = {
      name,
      lastname,
      office,
      birthdate,
      salary,
    };

    console.log((await insertEmployee(employee)).data);
  }

  async function handleUpdateEmployee() {
    const name = nameRef.current.value;
    const lastname = lastnameRef.current.value;
    const birthdate = birthdateRef.current.value;
    const salary = salaryRef.current.value;

    const employee = {
      name,
      lastname,
      birthdate,
      salary,
      office: {
        description: '',
      },
    };

    try {
      const response = await updateEmployee(employee, idProp);
      alert(response.data);
    } catch (error) {
      console.log(error.response.data);
      alert(error.response.data.error);
    }
  }

  return (
    <div className="container-form">
      <h1>Formulario de Cadastro do Funcionario</h1>
      <input
        ref={nameRef}
        type="text"
        placeholder="nome"
        defaultValue={nameProp}
      />
      <input
        ref={lastnameRef}
        type="text"
        placeholder="sobrenome"
        defaultValue={lastnameProp}
      />

      <select ref={officeRef} defaultValue={officeProp}>
        <option value={0}>selecione seu cargo</option>
        {offices.map((office, id) => {
          return (
            <>
              <option key={id} value={office.id}>
                {office.description}
              </option>
            </>
          );
        })}
      </select>
      <input
        ref={birthdateRef}
        type="date"
        placeholder="data de aniversário"
        defaultValue={birthdateProp}
      />
      <input
        ref={salaryRef}
        type="number"
        placeholder="salário"
        defaultValue={salaryProp}
      />
      {updateOrRegister ? (
        <button onClick={handleAddEmployee}>Cadastrar</button>
      ) : (
        <button onClick={handleUpdateEmployee}>Alterar</button>
      )}
    </div>
  );
}
