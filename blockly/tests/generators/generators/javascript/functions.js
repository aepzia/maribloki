Blockly.JavaScript['move_forward'] = function(block) {
  var code = 'move_forward();\n';
  return code;
};
Blockly.JavaScript['baldin_bidea'] = function(block) {
  var dropdown_aukerak = block.getFieldValue('aukerak');
  var statements_name = Blockly.JavaScript.statementToCode(block, 'NAME');
  // TODO: Assemble JavaScript into code variable.
  if(dropdown_aukerak=="F"){
    //bidea aurrean
    code="if (bidea_aurrean()){\n"+statements_name+"\n}";
  }else if(dropdown_aukerak=="R"){
    //bidea eskubian
    code="if (bidea_eskubian()){\n"+statements_name+"\n}";
  }else if(dropdown_aukerak=="L"){
    //Bidea ezkerrean
    code="if (bidea_ezkerrean()){\n"+statements_name+"\n}";
  }
  return code;
}
Blockly.JavaScript['baldin_bidea_bestela'] = function(block) {
  var dropdown_name = block.getFieldValue('NAME');
  var statements_egin = Blockly.JavaScript.statementToCode(block, 'egin');
  var statements_bestela = Blockly.JavaScript.statementToCode(block, 'bestela');
  // TODO: Assemble JavaScript into code variable.
  if(dropdown_aukerak=="F"){
    //bidea aurrean
    code="if (bidea_aurrean()){\n"+statements_egin+"\n}else{\n"+statements_bestela+"\n}";
  }else if(dropdown_aukerak=="R"){
    //bidea eskubian
    code="if (bidea_eskubian()){\n"+statements_egin+"\n}else{\n"+statements_bestela+"\n}";
  }else if(dropdown_aukerak=="L"){
    //Bidea ezkerrean
    code="if (bidea_ezkerrean()){\n"+statements_egin+"\n}else{\n"+statements_bestela+"\n}";
  }
  return code;
};

Blockly.JavaScript['errepikatu_helmuga_arte'] = function(block) {
  var text_helmuga = block.getFieldValue('helmuga');
  var statements_name = Blockly.JavaScript.statementToCode(block, 'NAME');
  // TODO: Assemble JavaScript into code variable.v
  var code = "function errekurtsibo(){setTimeout(\nfunction(){\nif(!helmugara_iritsi()){errekurtsibo();\n"+statements_name+"\n\n}\n},400);}\nerrekurtsibo();\n";
  return code;
};
Blockly.JavaScript['biratu_eskubira'] = function(block) {
  var dropdown_biratu = block.getFieldValue('biratu');
  if(dropdown_biratu=="L"){
    code = "biratu_ezkerreta();"
  }else if(dropdown_biratu=="R"){
    code = "biratu_eskubira();"
  }
  return code;
};
Blockly.JavaScript['biratu_ezkerreta'] = function(block) {
  var dropdown_biratu = block.getFieldValue('biratu');
  if(dropdown_biratu=="L"){
    code = "biratu_ezkerreta();"
  }else if(dropdown_biratu=="R"){
    code = "biratu_eskubira();"
  }
  return code;
};
