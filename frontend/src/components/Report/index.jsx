import { useEffect, useState } from 'react';
import { getEmployee } from '../../hook/api-access';
import './style.css';

export function Report() {
  const [reportShow, setReportShow] = useState([{}]);

  useEffect(() => {
    const fetchData = async () => {
      const employees = (await getEmployee()).data.employees;
      console.log(employees);
      setReportShow(employees);
    };
    fetchData();
  }, []);

  return (
    <div className='container-report'>
      {reportShow.map((employee, id) => {
        return (
          <div key={id} className='report-style'>
            <h1>Relatório</h1>
            <h2>
              Funcionário: {employee.name} {employee.lastname}
            </h2>
            <h2>Salário: R$ {Number(employee.salary).toFixed(2)}</h2>
            <h2>Data de Nascimento: {employee.birthdate}</h2>
            {employee.message && <h2>Parabenização: {employee.message}</h2>}
            <h2>Cargo: {employee.description}</h2>
          </div>
        );
      })}
    </div>
  );
}
