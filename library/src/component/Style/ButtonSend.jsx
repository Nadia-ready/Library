import React from 'react';
import styled from 'styled-components/macro';

const ButtonSendStyled = styled.button`
  display: inline-block;
  background: #00B2A9;
  color: white;
  font-size: 1em;
  margin: 1em;
  padding: 0.25em 1em;
  border-radius: 3px;
  display: block;
`;


const ButtonSend = () => {
  return (
    <ButtonSendStyled>
      Envoyer
    </ButtonSendStyled>
    
  );
};

export default ButtonSend;