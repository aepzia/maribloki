Blockly.Blocks['move_forward'] = {
  init: function() {
    this.appendDummyInput()
        .setAlign(Blockly.ALIGN_CENTRE)
        .appendField("mugi aurrera");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(290);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};
Blockly.Blocks['baldin_bidea'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("baldin")
        .appendField(new Blockly.FieldDropdown([["bidea dago aurrean","F"], ["bidea dago eskubian","R"], ["bidea dago ezkerrean","L"]]), "aukerak");
    this.appendStatementInput("NAME")
        .setCheck(null)
        .appendField("orduan");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};

Blockly.Blocks['baldin_bidea_bestela'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Baldin bidea")
        .appendField(new Blockly.FieldDropdown([["ezkerrean","L"], ["eskubian","R"], ["aurrean","F"]]), "NAME");
    this.appendStatementInput("egin")
        .setCheck(null)
        .appendField("egin");
    this.appendStatementInput("bestela")
        .setCheck(null)
        .appendField("bestela");
    this.setColour(230);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};

Blockly.Blocks['errepikatu_helmuga_arte'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("errepikatu")
        .appendField(new Blockly.FieldTextInput("helmugara ititsi arte"), "helmuga");
    this.appendStatementInput("NAME")
        .setCheck(null)
        .appendField("egin");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(120);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};
Blockly.Blocks['biratu_eskubira'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("biratu")
        .appendField(new Blockly.FieldDropdown([["eskubira","R"], ["ezkerrera","L"]]), "biratu");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(120);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};
Blockly.Blocks['biratu_ezkerreta'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("biratu")
        .appendField(new Blockly.FieldDropdown([["ezkerrera","L"], ["eskubira","R"]]), "biratu");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(120);
    this.setTooltip('');
    this.setHelpUrl('');
  }
};
